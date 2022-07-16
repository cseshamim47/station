import java.io.BufferedReader;
import java.io.FileReader;
import java.io.IOException;


public class PlasmaBank //extends IDB
{		
	public PlasmaBank (String filepath) {
		
		  
			try  
			{  
					//creates a new file instance  
			FileReader fr=new FileReader(filepath);   //reads the file  
			BufferedReader br=new BufferedReader(fr);  //creates a buffering character input stream  
			StringBuffer sb=new StringBuffer();    //constructs a string buffer with no characters  
			String line;  
			while((line=br.readLine())!=null)  
			{  
			sb.append(line);      //appends line to string buffer  
			sb.append("\n\n");     //line feed   
			}  
			fr.close();    //closes the stream and release the resources  
			System.out.println("~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~");
			System.out.println("\t\tPlasma Donors: ");  
			System.out.println("~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n");
			System.out.println(sb.toString());   //returns a string that textually represents the object  
			}  
			catch(IOException e)  
			{  
			e.printStackTrace();  
			}  
			System.out.println("~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~");
	}
	

}


