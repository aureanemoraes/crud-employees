<?php

namespace App\Enums;

enum SetorFuncionario:string {
    case Vendas = 'vendas';
    case Escritorio = 'escritorio';
    case Estoque = 'estoque';
    case Administrativo = 'administrativo';
}
