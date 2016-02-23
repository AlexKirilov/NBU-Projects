package com.testapp1.alex.buttongenerator;

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

import java.util.Random;

public class MainActivity extends AppCompatActivity {

    private Button showButton;
    private Button showNum;
    private Button increment;
    private Button decrement;
    private Button fadeText;
    private TextView showTextView;
    private TextView showTextViewCount;
    private TextView showTextViewNum;
    private TextView fadetxt;
    private EditText editTextID;

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

        showButton = (Button) findViewById(R.id.buttonRand);
        showTextView = (TextView) findViewById(R.id.textViewRand);
        showNum = (Button) findViewById(R.id.buttonRandNum);
        increment = (Button) findViewById(R.id.button1);
        decrement = (Button) findViewById(R.id.button2);
        fadeText = (Button) findViewById(R.id.buttonFade);
        showTextViewCount = (TextView) findViewById(R.id.textViewCount);
        showTextViewNum = (TextView) findViewById(R.id.textViewRandNum);
        fadetxt = (TextView) findViewById(R.id.textViewFade);
//        editTextID = (EditText) findViewById(R.id.editTextid);

        final String[] mountains = {"Everest" , "Vitosha" , "Rila" , "Pirin" , "Stara planina", "Popa" , "uga"};
        final String aa = "You pressed the button";
//        final int counter = 0;
        showButton.setOnClickListener(new View.OnClickListener(){
            @Override
            public void onClick(View v) {
                Random rand = new Random();
                int randNum = rand.nextInt(mountains.length);
                showTextView.setText(mountains[randNum]);
            }
        });
        showNum.setOnClickListener(new View.OnClickListener(){
            @Override
            public void onClick(View v) {
                Random rand = new Random();
                int randNumber = (rand.nextInt(80));
                String aaa;
                aaa = String.valueOf(randNumber);
                showTextViewNum.setText(aaa);
            }
        });
        increment.setOnClickListener(new View.OnClickListener(){
            int counter = 0;
            String aaa;
            @Override
            public void onClick(View v) {
                counter = Integer.parseInt(showTextViewCount.getText().toString());
                counter ++;
                aaa = String.valueOf(counter);
                showTextViewCount.setText(aaa);
            }
        });
        decrement.setOnClickListener(new View.OnClickListener(){
            int counter = 0;
            String aaa;
            @Override
            public void onClick(View v) {
                counter = Integer.parseInt(showTextViewCount.getText().toString());
                counter --;
                aaa = String.valueOf(counter);
                showTextViewCount.setText(aaa);
            }
        });
        fadeText.setOnClickListener(new View.OnClickListener(){
            @Override
            public void onClick(View v) {
                Toast.makeText(getApplicationContext(), "I was clicked", Toast.LENGTH_LONG).show();
                fadetxt.setText("I was clicked");
            }
        });
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
