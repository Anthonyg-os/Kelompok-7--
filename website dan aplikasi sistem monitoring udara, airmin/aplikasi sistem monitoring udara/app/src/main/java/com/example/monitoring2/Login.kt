package com.example.monitoring2

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.widget.ImageView
import android.widget.TextView

class Login : AppCompatActivity() {
    lateinit var tmbLogin: TextView;
    lateinit var tmbDaftar:TextView;
    lateinit var fb:ImageView;
    lateinit var google:ImageView;

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_login)

        tmbLogin= findViewById<TextView>(R.id.tmbLogin);
        tmbLogin.setOnClickListener {
            val intent = Intent(this, MainActivity::class.java)
            startActivity(intent)
        }
        tmbDaftar= findViewById<TextView>(R.id.tmbDaftar);
        tmbDaftar.setOnClickListener{
            val intent = Intent(this, Register::class.java)
            startActivity(intent)
        }
        fb=findViewById<ImageView>(R.id.fb);
        fb.setOnClickListener {
            val intent = Intent(this, MainActivity::class.java)
            startActivity(intent)
        }
        google = findViewById<ImageView>(R.id.google);
        google.setOnClickListener {
            val intent = Intent(this, MainActivity::class.java)
            startActivity(intent)
        }

    }
}