
<body>
<div class="container">
    <form action="server.php" method="post">
        <div class="row" id="header">
            <div class="col-sm-12 text-center">
                <h3><strong>Welcome to My Vocal Test</strong></h3>
            </div>
        </div>
        <span id="userInfo">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <strong>Please answer the following questions</strong>
                </div>
            </div><br>
            <div class="row">
                <div class="col-sm-12">
                    <?php
                        $questionsContent = file_get_contents('content/questions');
                        $questions = explode(PHP_EOL, $questionsContent);
                        $qNum = 0;
                    ?>
                    <input type="hidden" name="questionCount" value="<?php echo count($questions); ?>">

                    <?php foreach ($questions as $q):?>
                        <?php
                            $id = "qs-";
                            $qNum += 1;
                            $elements = explode('|', $q);
                            $answersCount = count($elements) - 1;
                            $i = 1;
                        ?>
                        <span class="input-field">
                            <strong><?php echo $elements[0];?></strong>
                            <?php while ($i <= $answersCount ): ?>
                                <div class="custom-control custom-radio">
                                  <input type="radio" class="custom-control-input" id="<?php echo $id . $qNum . '-a-' . $i;  ?>"
                                         name="<?php echo 'Q' . $qNum; ?>" value="<?php echo $i - 1; ?>">
                                  <label class="custom-control-label" for="<?php echo $id . $qNum . '-a-' . $i;  ?>"><?php echo $elements[$i]?></label>
                                </div>
                            <?php
                                $i += 1;
                                endwhile;
                            ?>

                        </span><br>



                    <?php  endforeach;  ?>

                    <div class="row start-btn-row">
                        <button type="button" class="btn btn-primary" id="start">Start</button>
                    </div>

                </div>
            </div>
        </span>

        <span id="explain-text">
            <div class="row">
            <div class="col-sm-12 text-center">
                <strong>
                    Please speak out the below text after you push the <i class="fa fa-microphone" id="mic-in-text"></i> button.
                    When you are comfortable with your vocal input, click the <i>Next</i> button for going to the next text.
                </strong>
            </div>
        </div>
        </span>

        <?php
            $inputContent = file_get_contents('content/Inputs');
            $inputs = explode(PHP_EOL, $inputContent);
            $inputNumber = 0;

        ?>
        <input type="hidden" id="Input-count" name="inputCount" value="<?php echo count($inputs);  ?>">
        <?php foreach ($inputs as $in):?>
            <?php
                $inputNumber += 1;
            ?>

            <span class="part" id="<?php echo 'part' . $inputNumber;  ?>">
                <dialog open id="<?php echo 'dialog' . $inputNumber;  ?>"><strong><i>
                            <?php echo $in;?>
                        </i></strong>
                </dialog>
                <div class="row text-center next-div">
                    <div class="col-sm-12 text-center check-sign">
                        <i class='fa fa-check'></i>
                    </div>

                    <div class="col-sm-12">
                        <a class="btn btn-primary record"> <i class="fa fa-microphone"></i></a>
                        <input type="hidden" name="<?php echo 'record' . $inputNumber;  ?>" value="null">
                    </div>
                    <div class="col-sm-12">
                        <button type="button" class="btn btn-primary next-bt" id="<?php echo 'next' . $inputNumber;  ?>">Next</button>
                    </div>
                </div>
            </span>

        <?php  endforeach; ?>

        <?php
            $inputNumber += 1;
        ?>

        <span id="last-part" class="input-field part">
            <label for="feedback"><strong>Thank you for your participation. As the last question, did you face any issue during this experiment?
                Or do you have any suggestions? Your feedback would be a great help for us.</strong></label><br>
            <textarea rows="8" cols="100" id="feedback" name="feedback" placeholder="Please give us your feedback..."></textarea>
            <div class="col-sm-12 text-center">
                <button type="button" class="btn btn-primary next-bt" id="finish-btn">Submit</button>
            </div>
        </span>
        <br><br>
        <div class="w3-light-grey w3-small pBar">
            <div class="w3-container w3-green">0%</div>
        </div>

        <input type="submit" id="submit-btn">
    </form>
</div>

</body>
</html>