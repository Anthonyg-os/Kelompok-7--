package com.example.monitoring2

import android.app.DatePickerDialog
import android.app.TimePickerDialog
import android.content.Context
import android.content.SharedPreferences
import android.graphics.Color
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.view.View
import android.widget.GridLayout
import android.widget.ImageView
import android.widget.TextView
import android.widget.Toast
import com.android.volley.Request
import com.android.volley.RequestQueue
import com.android.volley.Response
import com.android.volley.toolbox.JsonObjectRequest
import com.android.volley.toolbox.Volley
import org.json.JSONException
import java.text.SimpleDateFormat
import java.util.*

class StatusHistory : AppCompatActivity() {
    private var requestQueue: RequestQueue? = null
    lateinit var txtTanggal:TextView
    lateinit var txtAngkaHum:TextView
    lateinit var txtStatusHum:TextView
    lateinit var txtAngkaAqi:TextView
    lateinit var txtStatusAqi:TextView
    lateinit var txtAngkaTemp:TextView
    lateinit var txtStatusTemp:TextView
    lateinit var txtStatus:TextView

    lateinit var txtKosong:TextView
    lateinit var imgKebakaran:ImageView
    lateinit var urlx:String
    lateinit var gl:GridLayout


    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_status_history)
        requestQueue = Volley.newRequestQueue(this)

        txtTanggal= findViewById<TextView>(R.id.txtTanggal);
        txtAngkaHum= findViewById<TextView>(R.id.txtAngkaHum);
        txtStatusHum= findViewById<TextView>(R.id.txtStatusHum);
        txtAngkaAqi= findViewById<TextView>(R.id.txtAngkaAqi);
        txtStatusAqi= findViewById<TextView>(R.id.txtStatusAqi);
        txtAngkaTemp= findViewById<TextView>(R.id.txtAngkaTemp);
        txtStatusTemp= findViewById<TextView>(R.id.txtStatusTemp);
        txtKosong= findViewById<TextView>(R.id.txtKosong);
        txtStatus= findViewById<TextView>(R.id.txtStatus);
        gl= findViewById<GridLayout>(R.id.gl);
        gl.visibility=View.GONE

        imgKebakaran=findViewById<ImageView>(R.id.imgKebakaran);

        val sharedPreference =  getSharedPreferences("PREFERENCE_NAME", Context.MODE_PRIVATE)
        urlx= sharedPreference.getString("url","null").toString()
//        Toast.makeText(baseContext,urlx,Toast.LENGTH_LONG).show()

        var cal = Calendar.getInstance()

        val dateSetListener = DatePickerDialog.OnDateSetListener { view, year, monthOfYear, dayOfMonth ->
            cal.set(Calendar.YEAR, year)
            cal.set(Calendar.MONTH, monthOfYear)
            cal.set(Calendar.DAY_OF_MONTH, dayOfMonth)

            val myFormat = "EEE, dd-MM-yyyy" // mention the format you need
            val sqlFormat = "dd-MM-yyyy" // mention the format you need
            val sdf = SimpleDateFormat(myFormat, Locale.US)
            txtTanggal.text = sdf.format(cal.time)

            val sqlf = SimpleDateFormat(sqlFormat,Locale.US)
            var tanggale = sqlf.format(cal.time)

            tampildata(tanggale)

        }

        txtTanggal.setOnClickListener {
            DatePickerDialog(this@StatusHistory, dateSetListener,
                cal.get(Calendar.YEAR),
                cal.get(Calendar.MONTH),
                cal.get(Calendar.DAY_OF_MONTH)).show()
        }

    }



    private fun tampildata(tanggale:String){
//        Toast.makeText(baseContext,tanggale.toString(),Toast.LENGTH_LONG).show()
        val url = urlx+"json.php?tanggal="+tanggale.toString()
        val request = JsonObjectRequest(Request.Method.GET, url, null, Response.Listener {
                response ->try {
                    if(response.getString("status").toString().equals("fail")){
                        txtKosong.visibility= View.VISIBLE
                        gl.visibility=View.GONE

                    }else{
                        gl.visibility=View.VISIBLE
                        txtKosong.visibility= View.GONE
                        var hum=response.getJSONObject("data").getInt("hum")
                        var aqi=response.getJSONObject("data").getInt("aqi")
                        var temp=response.getJSONObject("data").getInt("temp")
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
                    }


        } catch (e: JSONException) {
            e.printStackTrace()
        }
        }, Response.ErrorListener { error -> error.printStackTrace() })
        requestQueue?.add(request)
    }
}