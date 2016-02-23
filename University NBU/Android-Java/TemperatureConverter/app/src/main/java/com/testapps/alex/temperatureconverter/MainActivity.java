package com.testapps.alex.temperatureconverter;

import android.os.Bundle;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.Snackbar;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.View;
import android.view.Menu;
import android.view.MenuItem;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import java.text.DecimalFormat;

public class MainActivity extends AppCompatActivity {

    private EditText enterTemp;
    private Button Cels_btn;
    private Button fahr_btn;
    private TextView show_result;

    DecimalFormat round = new DecimalFormat("0.0");


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);

        FloatingActionButton fab = (FloatingActionButton) findViewById(R.id.fab);
        fab.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Snackbar.make(view, "Replace with your own action", Snackbar.LENGTH_LONG)
                        .setAction("Action", null).show();
            }
        });
        enterTemp = (EditText) findViewById(R.id.editText);
        Cels_btn = (Button) findViewById(R.id.buttonCels);
        fahr_btn = (Button) findViewById(R.id.buttonFar);
        show_result = (TextView) findViewById(R.id.textViewShowResult);

        //Set buttons
        Cels_btn.setOnClickListener(new View.OnClickListener(){
            @Override
            public void onClick(View v) {
                String editTextVal = enterTemp.getText().toString();
                if(editTextVal.isEmpty()){
                    Toast.makeText(getApplicationContext(),"Enter a Value", Toast.LENGTH_LONG).show();
                }else{
                    double intedittxt = Double.parseDouble(editTextVal);
                    double convertetVal = converterToCels(intedittxt);
                    String result = String.valueOf(round.format(convertetVal));
//                    String str_res = round.format(result);
                    show_result.setText(result + " C");
                }
            }
        });
        fahr_btn.setOnClickListener(new View.OnClickListener(){
            @Override
            public void onClick(View v) {
                String editTextVal = enterTemp.getText().toString();
                if(editTextVal.isEmpty()){
                    Toast.makeText(getApplicationContext(),"Enter a Value", Toast.LENGTH_LONG).show();
                }else{
                    double intedittxt = Double.parseDouble(editTextVal);
                    double convertetVal = converterToFahr(intedittxt);
                    String result = String.valueOf(round.format(convertetVal));
//                    String str_res = (result);
                    show_result.setText(result + " F");
                }
            }
        });
    }

    public double converterToCels(double fahrVal){
        double resultCel;
        resultCel = (fahrVal - 32)*5/9;
        return resultCel;
    }
    public double converterToFahr(double celsVal){
        double resultFahr;
        resultFahr = (celsVal * 9/5) + 32;
        return resultFahr;
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.menu_main, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();

        //noinspection SimplifiableIfStatement
        if (id == R.id.action_settings) {
            return true;
        }

        return super.onOptionsItemSelected(item);
    }
}
