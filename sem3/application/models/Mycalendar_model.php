<?php

class Mycalendar_model extends CI_Model{
    public function loadCalendar(){
        $prefs['template'] = '
                
        {table_open}<div class="container-fluid bg-3 text-center ">{/table_open}

        {heading_row_start}<tr>{/heading_row_start}

        {heading_previous_cell}<th><a href="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
        {heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
        {heading_next_cell}<th><a href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}

        {heading_row_end}</tr>{/heading_row_end}

        {week_row_start}<div class="row day-row">{/week_row_start}
        {week_day_cell}<div class="col-xs-1 col-md-1 day-col">{week_day}</div>{/week_day_cell}
        {week_row_end}</div>{/week_row_end}

        {cal_row_start}<div class="row kalender">{/cal_row_start}
        {cal_cell_start}<div class="col-xs-12 col-md-1 day">{/cal_cell_start}
        {cal_cell_start_today}<div class="col-xs-1 col-md-1 recipe1-img day" title="Meatballs">{/cal_cell_start_today}
        {cal_cell_start_other}{/cal_cell_start_other}

        {cal_cell_content}<span class="label label-default">{day}</span>{/cal_cell_content}
        {cal_cell_content_today}<a href="recipe/Meatballs"><div class="col-xs-12 col-md-1 inactive"><span class="label label-default">{day}</span></div></a>{/cal_cell_content_today}

        {cal_cell_no_content}<span class="label label-default">{day}</span>{/cal_cell_no_content}
        {cal_cell_no_content_today}<span class="label label-default"><div class="highlight">{day}</div></span>{/cal_cell_no_content_today}

        {cal_cell_blank}&nbsp;{/cal_cell_blank}

        {cal_cell_other}<span class="label label-default">{day}</span>{/cal_cel_other}

        {cal_cell_end}</div>{/cal_cell_end}
        {cal_cell_end_today}</div>{/cal_cell_end_today}
        {cal_cell_end_other}</div>{/cal_cell_end_other}
        {cal_row_end}</div>{/cal_row_end}

        {table_close}</div>{/table_close}';


        $this->load->library('calendar', $prefs);
        return $this->calendar->generate();

    }
}
?>
