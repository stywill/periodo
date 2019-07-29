<?php

function gsim($item, $table, $where) {
    if ($where) {
        $where = " WHERE " . $where;
    } else {
        $where = "";
    }
    if ($item) {
        $apelido = explode('|', $item);
        $item = ($apelido[1]) ? $apelido[0] . "'" . $apelido[1] . "'" : $item;
    } else {
        $item = "*";
    }
    $gett = $this->sql(NULL, "SELECT " . $item . " FROM " . $this->db_prefix . $table . $where);
    while ($row = mysqli_fetch_object($gett)) {
        $linha[] = $row;
    }
    return $linha;
}

function selectClass($name, $id, $class, $onchange, $item, $concat, $table, $where, $ordem, $selected, $opcao) {
    $opcao = (!$opcao) ? 'Selecione uma opção' : $opcao;
    if ($name == "status" && $table == "") {
        $select = ' <select name="status" id="status" class="' . $class . '"  onchange="' . $onchange . '">';
        if (!$selected || $selected == "ATIVO")
            $se = "selected";
        else
            $se = "";
        $select .= '	<option value="A" ' . $se . '>ATIVO</option>';
        if ($selected == "I")
            $se = "selected";
        else
            $se = "";
        $select .= '	<option value="I" ' . $se . '>INATIVO</option>';
        $select .= '</select>';
    }else {
        $col = explode(",", $item);
        $var0 = $col[0];
        $var1 = $col[1];
        $var2 = $col[2];

        if ($col[0] == "concat") {
            $item = "concat(" . $col[1] . ",'" . $concat . "'," . $col[2] . ")," . $col[1] . "," . $col[2];
            $col[0] = $col[1] . $concat . $col[2];
            $flag = true;
        }
        $sql = "select " . $item . " from " . $this->db_prefix . $table;
        if ($where) {
            $sql .= " where " . $where;
        }
        if ($ordem) {
            $sql .= " order by " . $ordem;
        }

        $query = $this->sql(NULL, $sql);
        $select = '<select name="' . $name . '" id="' . $id . '" class="' . $class . '" onChange="' . $onchange . '" >';
        $select .= "<option value=''>" . $opcao . "</option>";
        while ($row = mysqli_fetch_object($query)) {
            if ($concat && $concat != 'data') {
                $desc = $row->$var1 . $concat . $row->$var2;
            } elseif ($concat == 'data') {
                $desc = date("d/m/Y", strtotime($row->$var1));
            } else {
                $desc = $row->$var1;
            }
            $apl = explode('.', $col[0]);
            $colu = ($apl[1]) ? $apl[1] : $col[0];
            $value = ($flag) ? $desc : $row->$var0;
            $select .= "<option value='" . $value . "' title='" . $desc . "'";
            $select .= ($selected == $value) ? " selected" : "";
            $select .= ">&nbsp;" . $desc . "</option>";
        }
        $select .= '</select>';
    }
    return $select;
}
