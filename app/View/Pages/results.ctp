<div class="container main-content">
    <div class="student_info">
        <h2>পরীক্ষার রেজাল্ট</h2>
        <hr>
        <div class="pull-left col-sm-4">
            <p>নাম : <strong><?php echo $student['Student']['name_en'];?></strong></p>
            <p>রোল : <strong><?php echo $student['Student']['roll_no'];?></strong></p>
            <p>শ্রেণী : <strong><?php echo $student['ClassName'];?></strong></p>
        </div>
            <div class="pull-right col-sm-3">
                <?php 
                if(!empty($student['Student']['image'])) {
                    echo "<div class=\"pull-right img-responsive\">";
                    echo $this->Html->image('../files/students_images/'.$student['Student']['image'], array('width'=>'150px', 'height'=>'150px'));
                    echo "</div>";
                }?>
            </div>
        <div style="clear:both"></div>
    </div>

    <?php for($i=1; $i<=3; $i++) { ?>
        <?php
            if($i==1) {
                $t = $i . "<sup>st</sup>";
            } elseif($i==2) {
                $t = $i . "<sup>nd</sup>";
            } elseif($i==3) {
                $t = $i . "<sup>rd</sup>";
            }

            $total_highest = 0;
            $total_total = 0;
            $total_monthly = 0;
            $total_terminal = 0;
            $total_subjects = 0;
            $total_lg = 0;
            $total_gpa = 0;
            $fail_flag = 0;
            $na_flag = 0;
        ?>
    	<div class="result">
            <h1><?php echo $t;?> Term : <?php echo $student['Student']['session']; ?></h1>
        </div>

    	<div class="row">
            <div class="col-sm-12">
                <div class="result-sheet">
                    <div class="table-responsive">
                        <table class="table" cellpadding="5" cellspacing="5">
                            <tr class="top_box background_th">
                                <td rowspan="2">Subject</td>
                                <td rowspan="2">Full<br/>mark</td>      
                                <td rowspan="2">Pass<br/>Mark</td>
                                <td rowspan="2">Highest<br/>mark</td>
                                <td colspan="3">Students' Markes</td>
                                <td rowspan="2">LG</td>
                                <td rowspan="2">GPA</td>
                            </tr>
                            <tr class="big_box background_th">
                                <td style="color: rgb(255, 255, 255);">Monthly</td>
                                <td style="color: rgb(255, 255, 255);">Terminal</td>
                                <td style="color: rgb(255, 255, 255);">Total</td>
                            </tr>
                            <?php foreach($subjects as $key => $subject) { ?>
                            <tr class="big_box">
                                <td style="background-color:#C7DDF3;"><?php echo $subject?></td>
                                <?php $total_subjects++; ?>
                                <td class="blue_1">100</td>      
                                <td class="blue_2">40</td>
                                <td><?php echo $highest[$i][$key];?></td>
                                <?php $total_highest += $highest[$i][$key];?>
                                <td>
                                    <?php
                                    if(!empty($student['Marks'][$i][$key]['monthly'])) {
                                        echo $student['Marks'][$i][$key]['monthly'];
                                        $total_monthly += $student['Marks'][$i][$key]['monthly'];
                                    }
                                    else
                                        echo "&nbsp;";
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                    if(!empty($student['Marks'][$i][$key]['terminal'])) {
                                        echo $student['Marks'][$i][$key]['terminal'];
                                        $total_terminal += $student['Marks'][$i][$key]['terminal'];
                                    }
                                    else
                                        echo "&nbsp;";
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                    if(!empty($student['Marks'][$i][$key]['total'])) {
                                        echo $student['Marks'][$i][$key]['total'];
                                        $total_total += $student['Marks'][$i][$key]['total'];
                                    }
                                    else
                                        echo "&nbsp;";
                                    ?>
                                </td>
                                <?php
                                    if(!empty($student['Marks'][$i][$key]['total'])) {
                                        if ($student['Marks'][$i][$key]['total'] >= 80) {
                                            $lg = "A+";
                                            $gpa = "5.00";
                                        } else if($student['Marks'][$i][$key]['total']>=70 && $student['Marks'][$i][$key]['total']<80) {
                                            $lg = "A";
                                            $gpa = "4.00";
                                        } else if($student['Marks'][$i][$key]['total']>=60 && $student['Marks'][$i][$key]['total']<70) {
                                            $lg = "A-";
                                            $gpa = "3.50";
                                        } else if($student['Marks'][$i][$key]['total']>=50 && $student['Marks'][$i][$key]['total']<60) {
                                            $lg = "B";
                                            $gpa = "3.00";
                                        } else if($student['Marks'][$i][$key]['total']>=40 && $student['Marks'][$i][$key]['total']<50) {
                                            $lg = "C";
                                            $gpa = "2.00";
                                        } else if($student['Marks'][$i][$key]['total']<40) {
                                            $lg = "F";
                                            $gpa = "0.00";

                                            $fail_flag = 1;
                                        }

                                        $total_gpa += $gpa;
                                    } else {
                                        $lg = "N/A";
                                        $gpa = "N/A";
                                        $na_flag = 1;
                                    }
                                ?>
                                <td><?php echo $lg;?></td>
                                <td><?php echo $gpa;?></td>
                            </tr>
                            <?php } ?>

                            <?php
                            if($fail_flag) {
                                $total_gpa = 0.00;
                            } else {
                                $total_gpa = $total_gpa / $total_subjects;
                            }
                            $total_gpa = number_format((float)$total_gpa, 2, '.', '');
                            if($total_gpa == 5.00) {
                                $total_lg = "A+";
                            } else if ($total_gpa < 5.00 && $total_gpa >= 4.00) {
                                $total_lg = "A";
                            } else if ($total_gpa < 4.00 && $total_gpa >= 3.50) {
                                $total_lg = "A-";
                            } else if ($total_gpa < 3.50 && $total_gpa >= 3.00) {
                                $total_lg = "B";
                            } else if ($total_gpa < 3.00 && $total_gpa >= 2.00) {
                                $total_lg = "C";
                            } else if ($total_gpa < 2.00) {
                                $total_lg = "F";
                            }

                            if($na_flag) {
                                $total_gpa = "N/A";
                                $total_lg = "N/A";
                            }
                            ?>
                            <tr class="big_box">
                                <td style="background-color:#C7DDF3;">Total</td>
                                <td class="blue_1"><?php echo $total_subjects*100;?></td>
                                <td class="blue_2"><?php echo $total_subjects*40;?></td>
                                <td><?php echo $total_highest;?></td>
                                <td><?php echo $total_monthly;?></td>
                                <td><?php echo $total_terminal;?></td>
                                <td><?php echo $total_total;?></td>
                                <td><?php echo $total_lg;?></td>
                                <td><?php echo $total_gpa;?></td>
                            </tr>
                            <!--<tr class="big_box">
                                <td style="background-color:#C7DDF3;">GPA</td>
                                <td class="blue_1">0000</td>      
                                <td class="blue_2">0000</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>     
                            </tr>-->
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>