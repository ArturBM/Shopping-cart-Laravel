<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){

        $usuarios = User::all()->count();
        //grafico 1
        $usersData = User::select([
            DB::raw('YEAR(created_at) as ano '),
            DB::raw('COUNT(*) as total'),
        ])
        ->groupBy(DB::raw('YEAR(created_at)')) 
        ->orderBy('ano', 'asc')
        ->get();
        //dd($usersData);

        //preparando as arrays
        foreach($usersData as $user){
            $ano[] = $user->ano;
            $total[] = $user->total;
        }
        
        //formatação das arrays
        $userLabel = "'Comparativo de cadastros de usuarios'";
        $userAno = implode(',', $ano);
        $userTotal = implode(',', $total);

        //grafico 2
        $catData = Categoria::with('produtos')->get();

        //preparação das arrays
        foreach($catData as $cat){
            $catNome[] = "'" . $cat->nome . "'";
            $catTotal[] = $cat->produtos->count();
        }

        //formatação das arrays
        $catLabel = implode(',', $catNome);
        $catTotal = implode(',', $catTotal);

        return view('admin.dashboard', compact('usuarios', 'userLabel', 'userAno', 'userTotal', 'catTotal', 'catLabel'));
    }
}
