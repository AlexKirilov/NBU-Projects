package com.testapps.alex.musikbox;

import android.media.MediaPlayer;
import android.os.Bundle;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.Snackbar;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.View;
import android.view.Menu;
import android.view.MenuItem;
import android.widget.Button;
import android.widget.TextView;

public class MainActivity extends AppCompatActivity implements View.OnClickListener {

    private Button prev, play, next;
    private MediaPlayer mediaPlayer;
    private TextView text;

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


        mediaPlayer = new MediaPlayer();
        mediaPlayer = MediaPlayer.create(getApplicationContext(),R.raw.kalimba);

        text = (TextView) findViewById(R.id.text_txt);

        play = (Button) findViewById(R.id.play_btn);
        prev = (Button) findViewById(R.id.prev_btn);
        next = (Button) findViewById(R.id.next_btn);

        play.setOnClickListener(this);
        prev.setOnClickListener(this);
        next.setOnClickListener(this);
    }

    @Override
    public void onClick(View v) {


        switch (v.getId()){
            case R.id.play_btn:
                if(mediaPlayer.isPlaying()){
                    pauseMusik();
                }else {
                    playMusik();
                }
            break;
            case R.id.prev_btn:
                prevMusik();
            break;
            case R.id.next_btn:
                mediaPlayer.stop();
            break;
        }
    }

    public void playMusik(){
        if (mediaPlayer != null){
            mediaPlayer.start();
            text.setText("Musik is plaing now");
//            play.setBackgroundDrawable(getResources().getDrawable(R.drawable.));
        }
    }

    public void pauseMusik(){
        if (mediaPlayer != null){
            mediaPlayer.pause();
            text.setText("Musik Paused!");
        }
    }

    public void prevMusik(){
        if (mediaPlayer != null){
            onDestroy();
            mediaPlayer = MediaPlayer.create(getApplicationContext(),R.raw.kilata);
            text.setText("Musik prev!");
            mediaPlayer.start();
        }
    };


    protected void onDestroy(){

        if(mediaPlayer != null && mediaPlayer.isPlaying()){
            mediaPlayer.stop();
            mediaPlayer.release();
            mediaPlayer = null;
        }
        super.onDestroy();
    }
}
