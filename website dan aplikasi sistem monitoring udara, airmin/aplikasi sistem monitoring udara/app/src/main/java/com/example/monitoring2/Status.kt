package com.example.monitoring2

import android.content.Context
import android.content.SharedPreferences
import android.graphics.Color
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.util.Log
import android.widget.ImageView
import android.widget.TextView
import android.widget.Toast
import com.android.volley.Request
import com.android.volley.RequestQueue
import com.android.volley.Response
import com.android.volley.toolbox.JsonObjectRequest
import com.android.volley.toolbox.Volley
import org.json.JSONException

class Status : AppCompatActivity() {
    private var requestQueue: RequestQueue? = null
    lateinit var txtTanggal:TextView
    lateinit var txtAngkaHum:TextView
    lateinit var txtStatusHum:TextView
    lateinit var txtAngkaAqi:TextView
    lateinit var txtStatusAqi:TextView
    lateinit var txtAngkaTemp:TextView
    lateinit var txtStatusTemp:TextView
    lateinit var txtStatus:TextView
    lateinit var imgKebakaran:ImageView
    lateinit var urlx:String
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_status)
        requestQueue = Volley.newRequestQueue(this)

        txtTanggal= findViewById<TextView>(R.id.txtTanggal);
        txtAngkaHum= findViewById<TextView>(R.id.txtAngkaHum);
        txtStatusHum= findViewById<TextView>(R.id.txtStatusHum);
        txtAngkaAqi= findViewById<TextView>(R.id.txtAngkaAqi);
        txtStatusAqi= findViewById<TextView>(R.id.txtStatusAqi);
        txtAngkaTemp= findViewById<TextView>(R.id.txtAngkaTemp);
        txtStatusTemp= findViewById<TextView>(R.id.txtStatusTemp);
        txtStatus= findViewById<TextView>(R.id.txtStatus);
        imgKebakaran=findViewById<ImageView>(R.id.imgKebakaran);

        val sharedPreference =  getSharedPreferences("PREFERENCE_NAME", Context.MODE_PRIVATE)
        urlx= sharedPreference.getString("url","null").toString()
//        Toast.makeText(baseContext,urlx,Toast.LENGTH_LONG).show()

        tampildata()

    }

    private fun tampildata(){
        val url = urlx+"json.php"
        val request = JsonObjectRequest(Request.Method.GET, url, null, Response.Listener {
                response ->try {
            var hum=response.getInt("hum")
            var aqi=response.getInt("aqi")
            var temp=response.getInt("temp")
            txtTanggal.setText("Status")
//            txtTanggal.setText("Status pada "+response.getString("tanggal"))
            txtAngkaHum.setText(hum.toString())
            if(hum>45 && hum<65){
                txtStatusHum.setText("Aman")
                txtStatusHum.setTextColor(Color.parseColor("#00FA55"))
            }else{
                txtStatusHum.setText("Bahaya")
                txtStatusHum.setTextColor(Color.parseColor("#FF0000"))
            }

            txtAngkaAqi.setText(aqi.toString())
            if(aqi<100){
                txtStatusAqi.setText("Aman")
                txtStatusAqi.setTextColor(Color.parseColor("#00FA55"))
            }else{
                txtStatusAqi.setText("Bahaya")
                txtStatusAqi.setTextColor(Color.parseColor("#FF0000"))
            }

            txtAngkaTemp.setText(temp.toString())
            if(temp>21 && temp<30){
                txtStatusTemp.setText("Aman")
                txtStatusTemp.setTextColor(Color.parseColor("#00FA55"))
            }else{
                txtStatusTemp.setText("Bahaya")
                txtStatusTemp.setTextColor(Color.parseColor("#FF0000"))
            }

            if(hum > 45 && aqi < 100 && temp < 40){
                txtStatus.setText("Rendah Kebakaran")
                txtStatus.setTextColor(Color.parseColor("#00FA55"))
                imgKebakaran.setColorFilter(Color.parseColor("#00FA55"))
            }else{
                txtStatus.setText("Tinggi Kebakaran")
                txtStatus.setTextColor(Color.parseColor("#FF0000"))
                imgKebakaran.setColorFilter(Color.parseColor("#FF0000"))
            }
//            val jsonArray = response.getJSONArray("employees")
//            for (i in 0 until jsonArray.length()) {
//                val employee = jsonArray.getJSONObject(i)
//                val firstName = employee.getString("firstname")
//                val age = employee.getInt("age")
//                val mail = employee.getString("mail")
//            }
        } catch (e: JSONException) {
            e.printStackTrace()
            Log.e("TAGEG",e.toString())
//            Toast.makeText(this,e.toString(),Toast.LENGTH_SHORT).show()

        }
        }, Response.ErrorListener { error -> error.printStackTrace() })
        requestQueue?.add(request)
    }
}