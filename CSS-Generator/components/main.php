<!-- Left Panel menu + panel Save -->
        <div class="inner-left">
            <div class="menu-bar">
                    <p class="golden-border">Menu Bar</p>
                    <ul id="ul_for_li" ><!--style="display: none"-->
                            <li><p id="MulCol"> Multiple Columns</p></li>
                            <li><p id="BorRad" > Border radius</p></li>				
                            <li><p id="TexSha"   onclick="HideNshow()"> Text shadow</p></li>
                            <li><p id="BoxSha"   onclick="HideNshow()"> Box Shadow</p></li>
                            <li><p id="BoxRes"   onclick="HideNshow()"> Box resize</p></li>
                            <li><p id="BoxSiz"   onclick="HideNshow()"> Box sizing</p></li>
                            <li><p id="Transit"  > Transition</p></li>
                            <li><p id="Transfo"  > Transform</p></li>
                            <li><p id="FontFace" > Font face</p></li>
                            <li><p id="Outline" > Outline</p></li>
                            <li><p id="RGBA"> RGBA</p></li>
                    </ul>
                    <p class="golden-border" ></p>
<!--                    <script type="text/javascript" >
                        $(document).ready(function() {
                           $('#ul_for_li').slideDown (4000);//({
                                //height:'toggle'}, 'slow');
                                $('.site-name').slideDown (3550);
                             //$('.site-name').animate({
                             //   height:'toggle'}, 'slow');
                            $('.site-name').animate({fontSize:'2.5em'},"slow");
                            $('.save-bar').slideDown (4300);                            
                        });
                    </script>-->
            </div>

            <div class="save-bar" ><!--style="display: none"-->
                <p class="golden-border">Save Bar</p>
                <!--   <input type="button" name="BANANI" id="css_button_ajax_call" value="PUPESH"/> -->
                <?php 
                        echo "<ol>";
                        //here we set the SAVED CSS DATA
                        //while ( <= ) {
                                echo "<li>vdfd  </li>";
                        //}

                        echo "</ol>";
                ?>

                <p class="golden-border"><span  id="load"> Load </span></p>
                
<!--                <script type="text/javascript">
                var auto_refresh = setInterval (
                        function (){
                                $('#load').hide('1000');
                                $('#load').show('1300');
                        }, 3000 );
                </script>-->
            </div>
        </div><!-- END Left Panel menu + panel Save -->


        <!-- Osnovno componenti -->
        <!-- Right Panel -->
        <div class="inner-right">
            <div class="enterData" id="opp">

            </div>

            <div  class="visualization" id="save">

                <div id="input_text"></div>
                    <div id="the_example" style="width:140px;height:140px;background-color:red;">


                    </div>
            </div>

            <div class="codeview">
                <form>
                    <label class="MandjaSgrozde"></label>
                    <div class="jsbuttons">
                        <button type="submit" name="copy" id="copyBut">COPY</button><br>
                        <button type="submit" name="save" id="saveThisSht">Save</button>
                    </div>
                </form>                    
            </div>
        </div><!-- END Right Panel -->
        <script>
            init();
        </script>