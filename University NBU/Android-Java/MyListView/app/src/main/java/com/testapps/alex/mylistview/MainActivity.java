package com.testapps.alex.mylistview;

import android.app.Activity;
import android.os.Bundle;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.Snackbar;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.View;
import android.view.Menu;
import android.view.MenuItem;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.ListView;
import android.widget.Toast;

import java.util.List;

public class MainActivity extends Activity {

    private ListView listView;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        listView = (ListView) findViewById(R.id.listId);

        final String[] values = new String[]{
                "tova e 1 post",
                "sega imame i komentar kum nego",
                "tova e 2 post",
                "i taka na tatuk",
                "tova e 3 post",
                "sega imame i komentar kum nego",
                "tova e 4 post",
                "i taka na tatuk",
                "tova e 5 post",
                "sega imame i komentar kum nego",
                "tova e 6 post",
                "i taka na tatuk",
                "tova e 7 post",
                "sega imame i komentar kum nego",
                "tova e 8 post",
                "i taka na tatuk"
        };

        ArrayAdapter<String> adapter = new ArrayAdapter<String>(getApplicationContext(), android.R.layout.simple_list_item_1, android.R.id.text1, values);

        //assing the adapter to listView
        listView.setAdapter(adapter);

        //on click
        listView.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> parent, View view, int position, long id) {
                int intPosition = position;
                String clickedValue = listView.getItemAtPosition(intPosition).toString();

                Toast.makeText(getApplicationContext(), clickedValue,Toast.LENGTH_LONG).show();
            }
        });
    }
}
