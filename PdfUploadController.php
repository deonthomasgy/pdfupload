<?php

namespace Statamic\Addons\PdfUpload;

use Event;

use Illuminate\Http\Request;
use Statamic\Extend\Controller;
use Statamic\API\AssetContainer;
use Statamic\API\Asset;
use Illuminate\Support\Facades\Log;
use Intervention\Image\ImageManagerStatic as Image;
use \Imagick;

class PdfUploadController extends Controller
{
    /**
     * Maps to your route definition in routes.yaml
     *
     * @return Illuminate\Http\Response
     */
    //public $imagic;

    // public function __construct() {
    //     $this->imagic = new \Imagick();
    // }
    
    public function index()
    {
        return $this->view('index');
    }

    // count pages of uploaded PDF files
    public function countPges($pdf){
        // get file contents
        $pdfContents = file_get_contents($pdf);
        // get count pages
        $pageCount = preg_match_all("/\/Page\W/", $pdfContents, $dummy);
        return $pageCount;
    }

    public function save(Request $request)
    {
         // validate upload
         $this->validate($request, [
             'pdf' => 'mimes:pdf|max:1000000'
         ]);
        //get file 
        $pdf = $request->file('upload');
        //get og file name
        $fileName = pathinfo($pdf->getClientOriginalName(), PATHINFO_FILENAME);
        // get home dic
        $home_path = getcwd() .'/assets/pdf/';  
        // upload folder
        $destinationPath = public_path($home_path);
        // move file to upload folder
        $pdf->move($destinationPath, $pdf->getClientOriginalName());
        // call update asset method / pass request and file extension
        // get page count
        $pageCount = $this->countPges($destinationPath. $pdf->getClientOriginalName());
        $this->updateYaml($request,$pageCount, $pdf->getClientOriginalName());
        //make call to API
        $this->api('PdfUpload')->renderPdf( $fileName, $pdf->getClientOriginalName() );
        return back()->with("success", "PDF Upload Successful / Please Hold While PDF is being converted !!!");
    }
    public function getAll(){
        //get asset list       
        $assets = Asset::whereFolder('pdf','main');
        $assetArray = [];
        foreach($assets as $asset){
            if(strcasecmp($asset->extension(),'pdf') == 0){
                array_push($assetArray, $asset);
            }
            
        }
        return  $this->view('asset', compact('assetArray'));
    }
    public function getEdit(Request $request){
        $id  = $request->id;
        $asset = Asset::find($id);
        $alt = $asset->toArray()['alt'];
        $file_detail = array(
            'file_id'=>$asset->id(),
            'file_path' => $asset->path(),
            'alt' => $alt
            );
        return $this->view('edit', compact('file_detail'));
    }

    public function updateAsset(Request $request){
        //get asset id
        $id = $request->id;
        // get instance of asset
        $asset = Asset::find($id);
        if($request->alt){
            $asset->set('alt', $request->alt);
        }
        if($request->year){
            $asset->set('year', $request->year);
        }
        if($request->download){
            $asset->set('download', $request->download);
        }
        $asset->save();
        return  back()->with('success', 'File Updated');
    }
    
    public function updateYaml($request, $pageCount, $ogFileName)
    {
        // find container
        $container = AssetContainer::find('main');
        //get book name
        $pdfPath = 'pdf/' . $ogFileName;
        // create asset
        $asset = $container->createAsset($pdfPath);
        // update meta data
        $asset->set('filename', $ogFileName);
        $asset->set('alt', $request->get('alt'));
        $asset->set('year', $request->get('year'));
        $asset->set('download', $request->get('download'));
        $asset->set('pages', $pageCount);
        // save to file
        $asset->save();
    }
}
