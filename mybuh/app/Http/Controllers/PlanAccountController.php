<?php

namespace App\Http\Controllers;

use App\Models\PlanAccount;
use App\Http\Requests\StorePlanAccountRequest;
use App\Http\Requests\UpdatePlanAccountRequest;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Exception;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\IOFactory;


class PlanAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

		//$articleTypes = Type::all();
		//$accounts = PlanAccount::with('articleType')->sortable()->get();
		$accounts = PlanAccount::sortable()->orderBy('account_number')->paginate(20);
		return view('accounts-plan.index', ['accounts'=>$accounts]);
    }
	
    public function indexAjax()
    {
		//$articleTypes = Type::all();
		//$accounts = PlanAccount::with('articleType')->sortable()->get();
		$accounts = PlanAccount::sortable()->get();

		$response_array = array(
            'accounts' => $accounts
        );

		$json_response = response()->json($response_array);
		
		return $json_response;	
		
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePlanAccountRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlanAccountRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PlanAccount  $planAccount
     * @return \Illuminate\Http\Response
     */
    public function show(PlanAccount $planAccount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PlanAccount  $planAccount
     * @return \Illuminate\Http\Response
     */
    public function edit(PlanAccount $planAccount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePlanAccountRequest  $request
     * @param  \App\Models\PlanAccount  $planAccount
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePlanAccountRequest $request, PlanAccount $planAccount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PlanAccount  $planAccount
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlanAccount $planAccount)
    {
        $planAccount->delete();
		$response_info = array(
			'success_message' => 'Sąskaita '.$planAccount->title.' sėkmingai ištrinta',
 		);
		
		$json_response = response()->json($response_info);
		
		return $json_response;
    }

	// -----------------------------------------------
	// -----------------------------------------------
	// -----------------------------------------------
	
	public function destroyMany(Request $request)
    {
		$deletionList = $request->deletionList;
		  
			foreach($deletionList as $account) {

				PlanAccount::where('id', $account)->delete();
	
			}
			
			//$accounts = PlanAccount::with('articleType')->sortable()->get();
			$accounts = PlanAccount::sortable()->get();
			
			$response_info = array(
				'success_message' => 'Sąskaitos sėkmigai ištrintos',
				 'accounts' => $accounts
			);
		
		$json_response = response()->json($response_info);
		
		return $json_response;
    }
	
	// -----------------------------------------------
	// ----------DuomenuImportas is excel--------------------
	// -----------------------------------------------
	
	function importData(Request $request){
	   
       $this->validate($request, [
           'uploaded_file' => 'required|file|mimes:xls,xlsx'

       ]);

       $the_file = $request->file('uploaded_file');

       try{

           $spreadsheet = IOFactory::load($the_file->getRealPath());
           $sheet        = $spreadsheet->getActiveSheet();
           $row_limit    = $sheet->getHighestDataRow();
           $column_limit = $sheet->getHighestDataColumn();
           $row_range    = range( 1, $row_limit );
           $column_range = range( 'D', $column_limit );
           $startcount = 1;

           $data = array();
           foreach ( $row_range as $row ) {
               $data[] = [
                   'account_number' =>$sheet->getCell( 'A' . $row )->getValue(),
                   'account_title' => $sheet->getCell( 'B' . $row )->getValue(),
                   'grouped_account' => $sheet->getCell( 'C' . $row )->getValue(),
                   'account_type' => $sheet->getCell( 'D' . $row )->getValue(),
               ];
               $startcount++;
           }
           DB::table('plan_accounts')->insert($data);

       } catch (Exception $e) {
           $error_code = $e->errorInfo[1];
           return back()->withErrors('There was a problem uploading the data!');
       }
       return back()->with('success_message','Great! Data has been successfully uploaded.');
   }
   
   	// -----------------------------------------------
	// ---------Paieška------------
	// -----------------------------------------------
   
   	public function searchAccount(Request $request){
		
		$searchValue = $request->searchValue;
		
		$accounts = PlanAccount::query()
		->where('account_number', 'like', "%{$searchValue}%")
		->orwhere('account_title', 'like', "%{$searchValue}%")
		->orwhere('account_type', 'like', "%{$searchValue}%")
		->orwhere('id', 'like', "%{$searchValue}%")
		->get();
		
		if(count($accounts) > 0){
			$response_info = array(
				'accounts' => $accounts
			);
		}else{
			
			$response_info = array(
				'error_message' => 'Pagal ieškomą frazę "'.$searchValue.'" nieko nerasta!'
			);			
			
		}
	
		$json_response = response()->json($response_info);
		
		return $json_response;
		
	}
}
