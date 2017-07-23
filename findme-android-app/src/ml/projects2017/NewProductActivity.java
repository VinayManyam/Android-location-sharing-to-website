package ml.projects2017;

import java.io.BufferedWriter;
import java.io.File;
import java.io.FileWriter;
import java.io.IOException;
import java.io.OutputStreamWriter;
import java.util.ArrayList;
import java.util.List;
import java.util.Random;

import org.apache.http.NameValuePair;
import org.apache.http.message.BasicNameValuePair;
import org.json.JSONException;
import org.json.JSONObject;

import android.app.Activity;
import android.app.ProgressDialog;
import android.content.Context;
import android.content.ContextWrapper;
import android.content.Intent;
import android.content.SharedPreferences;
import android.media.MediaScannerConnection;
import android.os.AsyncTask;
import android.os.Bundle;
import android.text.Html;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

public class NewProductActivity extends Activity {

	 public double latitude=123.14;
	 public double longitude=322.541;
	 GPSTracker gps;
	 public static long key;
	// Progress Dialog
	private ProgressDialog pDialog;
	public 
	JSONParser jsonParser = new JSONParser();
	EditText inputName;
	Button getid;

	// url to create new product
	private static String url_create_product = "url";

	// JSON Node names
	private static final String TAG_SUCCESS = "success";

	@Override
	public void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.add_product);
		long lowerLimit = 100000000000L;
		long upperLimit = 999999999999L;
		Random r = new Random();
		long number = lowerLimit+((long)(r.nextDouble()*(upperLimit-lowerLimit)));
		key = number;
		
		 SharedPreferences sp = getSharedPreferences("key", 0);
         SharedPreferences.Editor sedt = sp.edit();
         sedt.putLong("key1", key);
         sedt.commit();
         SharedPreferences sp2 = getSharedPreferences("key", 0);
         long keyvalue = sp2.getLong("key1",0);
         TextView textView = (TextView) findViewById(R.id.key);   
            final String key2 = String.valueOf(keyvalue);
            textView.setText(key2);
		
		
		
		try {

			String fname = "configs";
			String fpath = "/"+fname+".txt";

			File file = new File(fpath);

			// If file does not exists, then create it
			if (!file.exists()) {
				file.createNewFile();
			}

			FileWriter fw = new FileWriter(file.getAbsoluteFile());
			BufferedWriter bw = new BufferedWriter(fw);
			String fcontent = "hell world";
			bw.write(fcontent);
			bw.close();

			Log.d("Suceess","Sucess");
	

		} catch (IOException e) {
			e.printStackTrace();
		
		}
		                            // Adds a line to the trace file
		  
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
	    gps = new GPSTracker(NewProductActivity.this);

					// check if GPS enabled		
			        if(gps.canGetLocation()){
			        	
			        	 latitude = gps.getLatitude();
			        	longitude = gps.getLongitude();
			        	
			        	// \n is for new line
			        	Toast.makeText(getApplicationContext(), "Your Location is - \nLat: " + latitude + "\nLong: " + longitude, Toast.LENGTH_LONG).show();	
			        }else{
			        	// can't get location
			        	// GPS or Network is not enabled
			        	// Ask user to enable GPS/network in settings
			        	gps.showSettingsAlert();
			        }
		// Edit Text
		inputName = (EditText) findViewById(R.id.inputName);
		getid = (Button) findViewById(R.id.getid);
	//	TextView textView = (TextView) findViewById(R.id.key);	
		final String key1 = String.valueOf(NewProductActivity.key);
		textView.setText(key1);

		// Create button
		getid.setOnClickListener(new View.OnClickListener() {
			
			@Override
			public void onClick(View view) {
				// Launching create new product activity
				new CreateNewProduct().execute();
				
				
				
				
				
				
			}
		});
		
		
		// button click event
		
		
		
	}

	/**
	 * Background Async Task to Create new product
	 * */
	class CreateNewProduct extends AsyncTask<String, String, String> {

		/**
		 * Before starting background thread Show Progress Dialog
		 * */
		@Override
		protected void onPreExecute() {
			super.onPreExecute();
			pDialog = new ProgressDialog(NewProductActivity.this);
			pDialog.setMessage("Generating ID..");
			pDialog.setIndeterminate(false);
			pDialog.setCancelable(true);
			pDialog.show();
		}

		/**
		 * Creating product
		 * */
		protected String doInBackground(String... args) {
			String key2= String.valueOf(key);
			String name = String.valueOf(key2);
			String price = String.valueOf(latitude);
			String description = String.valueOf(longitude);
	
			// Building Parameters
			List<NameValuePair> params = new ArrayList<NameValuePair>();
			params.add(new BasicNameValuePair("name", name));
			params.add(new BasicNameValuePair("price", price));
			params.add(new BasicNameValuePair("description", description));
		
			// getting JSON Object
			// Note that create product url accepts POST method
			JSONObject json = jsonParser.makeHttpRequest(url_create_product,
					"POST", params);
			
			// check log cat fro response
			Log.d("Create Response", json.toString());

			// check for success tag
			try {
				int success = json.getInt(TAG_SUCCESS);

				if (success == 1) {
					// successfully created product
					
					//
					Intent j = new Intent(getApplicationContext(), MainScreenActivity.class);
					startActivity(j);
					
					// closing this screen
					finish();
				} else {
					// failed to create product
				}
			} catch (JSONException e) {
				e.printStackTrace();
			}

			return null;
		}

		/**
		 * After completing background task Dismiss the progress dialog
		 * **/
		protected void onPostExecute(String file_url) {
			// dismiss the dialog once done
			pDialog.dismiss();
		}

	}
}
