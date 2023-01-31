package com.example.monitoring2

import android.content.Context
import android.content.Intent
import android.content.SharedPreferences
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.widget.TextView
import androidx.cardview.widget.CardView
import androidx.fragment.app.FragmentManager

class MainActivity : AppCompatActivity() {

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)

        //set ip
        val sharedPreference =  getSharedPreferences("PREFERENCE_NAME", Context.MODE_PRIVATE)
        var editor = sharedPreference.edit()
        editor.putString("url","http://192.168.1.12/hebat/")
        editor.commit()

        val cdStatus = findViewById<CardView>(R.id.cdStatus);
        cdStatus.setOnClickListener{
            val intent = Intent(this, Status::class.java)
            startActivity(intent)
        }
        val cdHum = findViewById<CardView>(R.id.cdHum);
        cdHum.setOnClickListener{
            val intent = Intent(this, Hum::class.java)
            startActivity(intent)
        }
        val cdAqi = findViewById<CardView>(R.id.cdAqi);
        cdAqi.setOnClickListener{
            val intent = Intent(this, Aqi::class.java)
            startActivity(intent)
        }
        val cdTemp = findViewById<CardView>(R.id.cdTemp);
        cdTemp.setOnClickListener{
            val intent = Intent(this, Temp::class.java)
            startActivity(intent)
        }
        val cdFire = findViewById<CardView>(R.id.cdFire);
        cdFire.setOnClickListener{
            val intent = Intent(this, Fire::class.java)
            startActivity(intent)
        }
        val cdStatusHistory = findViewById<CardView>(R.id.cdHistory);
        cdStatusHistory.setOnClickListener{
            val intent = Intent(this, StatusHistory::class.java)
            startActivity(intent)
        }

    }
}