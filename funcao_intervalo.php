<?php

function periodo($dti, $dtf, $periodo) {

        $diasemana = array('Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabado');
        $diasemana_numero = date('w', strtotime($dti));
        $diasemana[$diasemana_numero];

        $d1 = explode('-', $dti);
        $d2 = explode('-', $dtf);

        $primeriro_dia = date('w', mktime(0, 0, 0, $d1[1], $d1[2], $d1[0]));
        $ultimo_dia = date('w', mktime(0, 0, 0, $d2[1], $d2[2], $d2[0]));
        $i = 0;
        while (mktime(0, 0, 0, $d1[1], $d1[2] + $i, $d1[0]) <= mktime(0, 0, 0, $d2[1], $d2[2], $d2[0])) {
            $diasemana_numero = date('w', mktime(0, 0, 0, $d1[1], $d1[2] + $i, $d1[0]));
            $data[][$diasemana[$diasemana_numero]] = date('Y-m-d', mktime(0, 0, 0, $d1[1], $d1[2] + $i, $d1[0]));

            if ($diasemana[$diasemana_numero] == 'Segunda' || $diasemana[$diasemana_numero] == 'Sexta') {
                if ($diasemana[$diasemana_numero] == 'Segunda') {
                    $segunda[] = array($diasemana[$diasemana_numero], $data[$i][$diasemana[$diasemana_numero]]);
                } else {
                    $sexta[] = array($diasemana[$diasemana_numero], $data[$i][$diasemana[$diasemana_numero]]);
                }
            }
            if ($diasemana[$diasemana_numero] == 'Domingo' || $diasemana[$diasemana_numero] == 'Sabado') {
                if ($diasemana[$diasemana_numero] == 'Sabado') {
                    $sabado[] = array($diasemana[$diasemana_numero], $data[$i][$diasemana[$diasemana_numero]]);
                } else {
                    $domingo[] = array($diasemana[$diasemana_numero], $data[$i][$diasemana[$diasemana_numero]]);
                }
                $confds++;
            }
            $i++;
        }
        //return 'segunda: '.count($segunda)." sexta: ".count($sexta);
        if (count($segunda) == count($sexta)) {
            if (in_array($primeriro_dia, array(2, 3, 4))) {
                array_unshift($segunda, array("DIA", date('Y-m-d', mktime(0, 0, 0, $d1[1], $d1[2], $d1[0]))));
            }
            if (in_array($ultimo_dia, array(2, 3, 4))) {
                array_push($sexta, array("DIA", date('Y-m-d', mktime(0, 0, 0, $d2[1], $d2[2], $d2[0]))));
            }
            $cont = count($segunda);
        } elseif (count($sexta) > count($segunda)) {
            array_unshift($segunda, array("DIA", date('Y-m-d', mktime(0, 0, 0, $d1[1], $d1[2], $d1[0]))));
            $cont = count($segunda);
        } else {
            array_push($sexta, array("DIA", date('Y-m-d', mktime(0, 0, 0, $d2[1], $d2[2], $d2[0]))));
            $cont = count($sexta);
        }
        $sem = 1;
        if ($periodo == 'semana') {
            for ($j = 0; $j < $cont; $j++) {
                //2º Sem - 11.05 a 12.05
                $retorno[$j]['exibe'] = $sem . "º Sem - " . date('d/m', strtotime($segunda[$j][1])) . " e " . date('d/m', strtotime($sexta[$j][1]));
                $retorno[$j]['banco'] = $sem ."|". date('d/m', strtotime($segunda[$j][1])) . " e " . date('d/m', strtotime($sexta[$j][1]));
                $sem++;
            }
        } else {
            for ($j = 0; $j < $confds; $j++) {
                if ($sabado[$j][1]) {
                    $retorno[$j]['exibe'] = $sem . "º Sem - " . date('d/m', strtotime($sabado[$j][1])) . " e " . date('d/m', strtotime($domingo[$j][1]));
                    $retorno[$j]['banco'] = $sem . "|" . date('d/m', strtotime($sabado[$j][1])) . " e " . date('d/m', strtotime($domingo[$j][1]));
                    $sem++;
                }
            }
        }
        return $retorno;
    }