package com.testapps.alex.deutchtestapp;

import android.content.DialogInterface;
import android.os.Bundle;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.Snackbar;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.View;
import android.view.Menu;
import android.view.MenuItem;
import android.widget.Button;
import android.widget.CheckBox;
import android.widget.EditText;
import android.widget.RadioButton;
import android.widget.RadioGroup;
import android.widget.SeekBar;
import android.widget.TextView;
import android.widget.Toast;

import java.awt.font.TextAttribute;

public class MainActivity extends AppCompatActivity {

    private Button submit;
    private TextView seekbar_txt;
    private SeekBar seekBar;
    private EditText name;
    private RadioGroup radioGroup1, radioGroup2;
    private RadioButton gender,answear1;
    private CheckBox cb1,cb2,cb3,cb4,cb5,cb6,cb7,cb8,cb9;
    private String F_name, vid;
    private int age, result = 0;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        submit = (Button) findViewById(R.id.submit_btn);
        seekbar_txt = (TextView) findViewById(R.id.user_age_seekbar);
        seekBar = (SeekBar) findViewById(R.id.seekbarid);
        name = (EditText) findViewById(R.id.editText);
        radioGroup1 = (RadioGroup) findViewById(R.id.radioGroup1);
        radioGroup2 = (RadioGroup) findViewById(R.id.radioGroup2);
        cb1 = (CheckBox) findViewById(R.id.q2c1);
        cb2 = (CheckBox) findViewById(R.id.q3c1);
        cb3 = (CheckBox) findViewById(R.id.q4c4);
        cb4 = (CheckBox) findViewById(R.id.q5c2);
        cb5 = (CheckBox) findViewById(R.id.q6c3);
        cb6 = (CheckBox) findViewById(R.id.q7c4);
        cb7 = (CheckBox) findViewById(R.id.q8c4);
        cb8 = (CheckBox) findViewById(R.id.q9c2);
        cb9 = (CheckBox) findViewById(R.id.q10c3);


        seekbar_txt.setText("Age: " + seekBar.getProgress() + "/" + seekBar.getMax());


        //SeekBar
        seekBar.setOnSeekBarChangeListener(new SeekBar.OnSeekBarChangeListener() {

            @Override
            public void onProgressChanged(SeekBar seekBar, int progress, boolean fromUser) {
                seekbar_txt.setText("Age: " + progress + "/" + seekBar.getMax());
                age = progress;
            }

            @Override
            public void onStartTrackingTouch(SeekBar seekBar) {

            }

            @Override
            public void onStopTrackingTouch(SeekBar seekBar) {

            }
        });

        submit.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                result = 0;
                F_name = null;
                //Get Name of the user
                F_name = name.getText().toString();

                //On Click Submit button
                //Get Gender
                int choiceGender = radioGroup1.getCheckedRadioButtonId();
                int choiceAnswear = radioGroup2.getCheckedRadioButtonId();
                gender = (RadioButton) findViewById(choiceGender);
                answear1 = (RadioButton) findViewById(choiceAnswear);
                vid = gender.getText().toString();
                //CheckBox - results
                //2131492987
                if(choiceAnswear == 2131492987){
                    result += 5;
                }
                if (cb1.isChecked()){
                    result += 5;
                }
                if (cb2.isChecked()){
                    result += 5;
                }
                if (cb3.isChecked()){
                    result += 5;
                }
                if (cb4.isChecked()){
                    result += 5;
                }
                if (cb5.isChecked()){
                    result += 5;
                }
                if (cb6.isChecked()){
                    result += 5;
                }
                if (cb7.isChecked()){
                    result += 5;
                }
                if (cb8.isChecked()){
                    result += 5;
                }
                if (cb9.isChecked()){
                    result += 5;
                }

//                Toast.makeText(getApplicationContext(), "RadioButton: Choice " + choiceAnswear + " | " + answear1.getId(),Toast.LENGTH_LONG).show();
                Toast.makeText(getApplicationContext(), "Result is: " + result + "/50 " + F_name + " : " + vid + " : " + age,Toast.LENGTH_LONG).show();
            }
        });

    }
}
