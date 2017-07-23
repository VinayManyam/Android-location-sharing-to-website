package ml.projects2017;





import android.app.Activity;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.os.Handler;
import android.text.Html;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.CompoundButton;
import android.widget.EditText;
import android.widget.Switch;
import android.widget.TextView;
import android.widget.ToggleButton;



public class MainScreenActivity extends Activity {
	protected static final long TIME_DELAY = 30000;
	public static boolean killMe;
	Button btnViewProducts;
	Button btnNewProduct;
	Button start;
	Button stop;
	Button btnShowLocation;
	Button share;
	Handler handler=new Handler();  
	int count =0;
	
	@Override
	public void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.main_screen);
		
		 SharedPreferences sp2 = getSharedPreferences("key", 0);
         long keyvalue = sp2.getLong("key1",0);
         TextView textView = (TextView) findViewById(R.id.TV);   
            final String key2 = String.valueOf(keyvalue);
            textView.setText(key2);
		
            Intent i = new Intent(getApplicationContext(), AllProductsActivity.class);
			startActivity(i);
					
		
		
		// Buttons
	
		btnNewProduct = (Button) findViewById(R.id.btnCreateProduct);
		btnShowLocation = (Button) findViewById(R.id.btnShowLocation);
		start = (Button) findViewById(R.id.startserv);
		stop = (Button) findViewById(R.id.button2);
		share =(Button)findViewById(R.id.sh);
		// view products click event

		// view products click event
		btnNewProduct.setOnClickListener(new View.OnClickListener() {
			
			@Override
			public void onClick(View view) {
				// Launching create new product activity
			
				Intent j = new Intent(getApplicationContext(), NewProductActivity.class);
				startActivity(j);
				finish();
			}
		});
		
		
btnShowLocation.setOnClickListener(new View.OnClickListener() {
			
			@Override
			public void onClick(View arg0) {		
				// create class object
				Intent i = new Intent(getApplicationContext(), EditProductActivity.class);
				startActivity(i);
				//
				
			}
		});
start.setOnClickListener(new View.OnClickListener() {
	
	@Override
	public void onClick(View arg0) {		
		// create class object
		boolean killMe = true;
		 handler.post(updateTextRunnable);
		
	}
});



stop.setOnClickListener(new View.OnClickListener() {
	
	@Override
	public void onClick(View arg0) {		
		// create class object
		boolean killMe = false;
		 handler.removeCallbacks(updateTextRunnable);
		 TextView textView2 = (TextView) findViewById(R.id.time);	
	      textView2.setText("service is stoped");
	}
});
//TextView textView = (TextView) findViewById(R.id.TV);	
//final String key1 = String.valueOf(NewProductActivity.key);
//textView.setText(key1);
		
		
share.setOnClickListener(new View.OnClickListener() {
	
	@Override
	public void onClick(View view) {
		// Launching create new product activity
		
		Intent sharingIntent = new Intent();
		sharingIntent.setAction(Intent.ACTION_SEND);
		sharingIntent.setType("text/plain");
		sharingIntent.putExtra(android.content.Intent.EXTRA_TEXT, ("ID: "+key2+" Visit Website "+" http://projects2017.ml/ "));
		 sharingIntent.putExtra(android.content.Intent.EXTRA_SUBJECT, "Findmenow");
		startActivity(Intent.createChooser(sharingIntent,"Share using"));

		
	}
	});
		
		
		
	}
	
	
	Runnable updateTextRunnable=new Runnable(){  
		

		  public void run() {  
			  if(!killMe){
		      count++;

		      TextView textView2 = (TextView) findViewById(R.id.time);	
		      textView2.setText("service is running..");
		  
		  
		      Intent i = new Intent(getApplicationContext(), EditProductActivity.class);
			startActivity(i);

		      handler.postDelayed(this, TIME_DELAY);  
			  }
		     }  
	
		
		 };
}
