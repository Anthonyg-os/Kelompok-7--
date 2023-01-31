package com.example.monitoring2

import android.content.Context
import android.content.SharedPreferences
import android.graphics.Color
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.widget.ImageView
import android.widget.TextView
import android.widget.Toast
import com.android.volley.Request
import com.android.volley.RequestQueue
import com.android.volley.Response
import com.android.volley.toolbox.JsonObjectRequest
import com.android.volley.toolbox.Volley
import org.json.JSONException

class Fire : AppCompatActivity() {
    private var requestQueue: RequestQueue? = null
    lateinit var txtAngka:TextView
    lateinit var txtStatus:TextView
    lateinit var imgView:ImageView
    lateinit var urlx:String
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_fire)
        requestQueue = Volley.newRequestQueue(this)

        txtAngka= findViewById<TextView>(R.id.txtAngka);
        txtStatus= findViewById<TextView>(R.id.txtStatus);
        imgView=findViewById<ImageView>(R.id.imgView);

        val sharedPreference =  getSharedPreferences("PREFERENCE_NAME", Context.MODE_PRIVATE)
        urlx= sharedPreference.getString("url","null").toString()

        tampildata()

    }

    private fun tampildata(){
        val url = urlx+"json.php"
        val request = JsonObjectRequest(Request.Method.GET, url, null, Response.Listener {
                response ->try {
            var hum=response.getInt("hum")
            var aqi=response.getInt("aqi")
            var temp=response.getInt("temp")
            if(hum > 45 && aqi < 100 && temp < 40){
                txtStatus.setText("Rendah Kebakaran")
                txtStatus.setTextColor(Color.parseColor("#00FA55"))
                imgView.setColorFilter(Color.parseColor("#00FA55"))
            }else{
                txtStatus.setText("Tinggi Kebakaran")
                txtStatus.setTextColor(Color.parseColor("#FF0000"))
                imgView.setColorFilter(Color.parseColor("#FF0000"))
            }

        } catch (e: JSONException) {
            e.printStackTrace()
        }
        }, Response.ErrorListener { error -> error.printStackTrace() })
        requestQueue?.add(request)
    }
}