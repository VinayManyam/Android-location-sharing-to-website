package ml.projects2017;

import java.util.ArrayList;
import java.util.List;

import org.apache.http.NameValuePair;
import org.apache.http.message.BasicNameValuePair;

import org.json.JSONException;
import org.json.JSONObject;



import android.app.Activity;
import android.app.ProgressDialog;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.AsyncTask;
import android.os.Bundle;
import android.text.Html;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

public class EditProductActivity extends Activity {

	 public double latitude=123.14;
	 public double longitude=322.541;
	 GPSTracker gps;
	// Progress Dialog
	private ProgressDialog pDialog;
	public 
	JSONParser jsonParser = new JSONParser();
	EditText inputName;
Button share;

	// url to create new product
	private static String url_create_product = "";

	// JSON Node names
	private static final String TAG_SUCCESS = "success";

	@Override
	public void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.add_product);
		
		 SharedPreferences sp2 = getSharedPreferences("key", 0);
         long keyvalue = sp2.getLong("key1",0);
         TextView textView = (TextView) findViewById(R.id.key);   
            final String key3 = String.valueOf(keyvalue);
            textView.setText(key3);
		
		
		
		
	    gps = new GPSTracker(EditProductActivity.this);

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
	
		//TextView textView = (TextView) findViewById(R.id.key);	
		//final String key1 = String.valueOf(NewProductActivity.key);
		//textView.setText(key1);
		// Create button
	
	
		new CreateNewProduct().execute();
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
			pDialog = new ProgressDialog(EditProductActivity.this);
			pDialog.setMessage("Updating..");
			pDialog.setIndeterminate(false);
			pDialog.setCancelable(true);
			pDialog.show();
		}
		SharedPreferences sp2 = getSharedPreferences("key", 0);
        long keyvalue = sp2.getLong("key1",0);
		/**
		 * Creating product
		 * */
		protected String doInBackground(String... args) {
			
	         final String key3 = String.valueOf(keyvalue);
			
			
			String price = String.valueOf(latitude);
			String description = String.valueOf(longitude);
	
			// Building Parameters
			List<NameValuePair> params = new ArrayList<NameValuePair>();
			params.add(new BasicNameValuePair("name", key3));
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
