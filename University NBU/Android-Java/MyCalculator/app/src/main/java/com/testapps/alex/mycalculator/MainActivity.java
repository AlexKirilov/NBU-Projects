package com.testapps.alex.mycalculator;

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

import java.text.DecimalFormat;

public class MainActivity extends AppCompatActivity implements View.OnClickListener {

    //Adding Buttons
    private Button clean;
    private Button percent;
    private Button deleno;
    private Button umnojenie;
    private Button minus;
    private Button sbor;
    private Button edno;
    private Button dve;
    private Button tri;
    private Button chetiri;
    private Button pet;
    private Button shest;
    private Button sedem;
    private Button osem;
    private Button devet;
    private Button nula;
    private Button zapetaq;
    private Button ravno;

    private EditText display;

    private String content, num1, num2, symbol;
    private Double number1, number2, result;

    DecimalFormat round = new DecimalFormat("0.00");

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

        clean = (Button) findViewById(R.id.clear_btn);
        percent = (Button) findViewById(R.id.btn_percent);
        deleno = (Button) findViewById(R.id.btn_deleno);
        umnojenie = (Button) findViewById(R.id.btn_umnojeno);
        minus = (Button) findViewById(R.id.btn_minus);
        sbor = (Button) findViewById(R.id.btn_plus);
        zapetaq = (Button) findViewById(R.id.btn_zapetaika);
        edno = (Button) findViewById(R.id.btn1);
        dve = (Button) findViewById(R.id.btn2);
        tri = (Button) findViewById(R.id.btn3);
        chetiri = (Button) findViewById(R.id.btn4);
        pet = (Button) findViewById(R.id.btn5);
        shest = (Button) findViewById(R.id.btn6);
        sedem = (Button) findViewById(R.id.btn7);
        osem = (Button) findViewById(R.id.btn8);
        devet = (Button) findViewById(R.id.btn9);
        nula = (Button) findViewById(R.id.btn0);
        ravno = (Button) findViewById(R.id.btn_equals);

        display = (EditText) findViewById(R.id.editText);


        clean.setOnClickListener(this);
        percent.setOnClickListener(this);
        deleno.setOnClickListener(this);
        umnojenie.setOnClickListener(this);
        minus.setOnClickListener(this);
        sbor.setOnClickListener(this);
        ravno.setOnClickListener(this);
        zapetaq.setOnClickListener(this);
        edno.setOnClickListener(this);
        dve.setOnClickListener(this);
        tri.setOnClickListener(this);
        chetiri.setOnClickListener(this);
        pet.setOnClickListener(this);
        shest.setOnClickListener(this);
        sedem.setOnClickListener(this);
        osem.setOnClickListener(this);
        devet.setOnClickListener(this);
        nula.setOnClickListener(this);
    }
    @Override
    public void onClick(View v) {

        switch (v.getId()){
            case R.id.clear_btn:
                content = "";
                display.setText("");
                break;
            case R.id.btn0:
                content = (display.getText().toString()) + 0;
                display.setText(content);
                break;
            case R.id.btn1:
                content = (display.getText().toString()) + 1;
                display.setText(content);
                break;
            case R.id.btn2:
                content = (display.getText().toString()) + 2;
                display.setText(content);
                break;
            case R.id.btn3:
                content = (display.getText().toString()) + 3;
                display.setText(content);
                break;
            case R.id.btn4:
                content = (display.getText().toString()) + 4;
                display.setText(content);
                break;
            case R.id.btn5:
                content = (display.getText().toString()) + 5;
                display.setText(content);
                break;
            case R.id.btn6:
                content = (display.getText().toString()) + 6;
                display.setText(content);
                break;
            case R.id.btn7:
                content = (display.getText().toString()) + 7;
                display.setText(content);
                break;
            case R.id.btn8:
                content = (display.getText().toString()) + 8;
                display.setText(content);
                break;
            case R.id.btn9:
                content = (display.getText().toString()) + 9;
                display.setText(content);
                break;

            case R.id.btn_zapetaika:
                content = (display.getText().toString()) + '.';
                display.setText(content);
                break;

            case R.id.btn_percent:
                num1 = (display.getText().toString());
                number1 = Double.parseDouble(num1);
                display.setText(String.valueOf(round.format(number1 / 100)));
                break;
            case R.id.btn_deleno:
                num1 = (display.getText().toString());
                number1 = Double.parseDouble(num1);
                symbol = "/";
                display.setText("");
                break;
            case R.id.btn_umnojeno:
                num1 = (display.getText().toString());
                number1 = Double.parseDouble(num1);
                symbol = "*";
                display.setText("");
                break;
            case R.id.btn_minus:
                num1 = (display.getText().toString());
                number1 = Double.parseDouble(num1);
                symbol = "-";
                display.setText("");
                break;
            case R.id.btn_plus:
                num1 = (display.getText().toString());
                number1 = Double.parseDouble(num1);
                symbol = "+";
                display.setText("");
                break;

            case R.id.btn_equals:
                num2 = (display.getText().toString());
                number2 = Double.parseDouble(num2);
                switch (symbol){
                    case "/":
                        result = number1 / number2;
                        display.setText(String.valueOf(round.format(result)));
                        break;
                    case "*":
                        result = number1 * number2;
                        display.setText(String.valueOf(round.format(result)));
                        break;
                    case "-":
                        result = number1 - number2;
                        display.setText(String.valueOf(round.format(result)));
                        break;
                    case "+":
                        result = number1 + number2;
                        display.setText(String.valueOf(round.format(result)));
                        break;
                }
                break;

        }
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
