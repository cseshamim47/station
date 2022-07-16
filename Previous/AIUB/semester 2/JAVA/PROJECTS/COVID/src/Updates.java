import java.io.*;
import java.util.Scanner;

public class Updates {
	
	private Scanner y;
	static String filename;
	String tempSL;
	String tempResult;
	String agmnt;
	String f3;
	String f9;
	String f4;
	String f5;
	String f6;
	String f7;
	String f8;
	public int Counter(String filename) throws IOException {
	    InputStream is = new BufferedInputStream(new FileInputStream(filename));
	    try {
	        byte[] c = new byte[1024];
	        int count = 0;
	        int readChars = 0;
	        boolean endsWithoutNewLine = false;
	        while ((readChars = is.read(c)) != -1) {
	            for (int i = 0; i < readChars; ++i) {
	                if (c[i] == '\n')
	                    ++count;
	            }
	            endsWithoutNewLine = (c[readChars - 1] != '\n');
	        }
	        if(endsWithoutNewLine) {
	            ++count;
	        } 
	        return count;
	    } finally {
	        is.close();
	    }
	}
	
	int Counter(int counter, String filename) {	
		if(filename == "DB2.txt") {
			
			int tempResultc = 0;
			int i=0;
			//System.out.println(counter);
			//System.out.println(filename);
			try
			{							
				y = new Scanner(new File(filename));
				y.useDelimiter("[,\n]");
				
				while(y.hasNext() && i <= counter)
				{	
					//while(y.hasNext() && !found)
					//{

						tempSL = y.next();
						tempResult = y.next();
						agmnt = y.next();
						//System.out.println(tempResult);
						//}
					if (tempResult.trim().equals("p"))
					{
						tempResultc++;
					
					}
					i++;
				}
					return 	tempResultc;
			}
			
			catch(Exception e)
			{		
				System.out.println("Error! Wrong ID\nPlease retry. If you think something is wrong please contact with IT support team.\nThanks\n");	
				return 0;
			
		}}
		
		else if (filename == "DB.txt") {
			
			int tempResultc = 0;
			int i=0;
			//System.out.println(counter);
			//System.out.println(filename);
			try
			{							
				y = new Scanner(new File(filename));
				y.useDelimiter("[,\n]");
				
				while(y.hasNext() && i <= counter)
				{	
					//while(y.hasNext() && !found)
					//{

						tempSL = y.next();
						tempResult = y.next();
						agmnt = y.next();
						f3 = y.next(); // BG
						f4 = y.next();  // Name
						f5 = y.next(); // 
						f6 = y.next();
						f7 = y.next();
						f8 = y.next(); // Area
						f9 = y.next(); // Phone
						//System.out.println(tempResult);
						//}
					if (tempResult.trim().equals("p"))
					{
						tempResultc++;
					
					}
					i++;
				}
					return 	tempResultc;
			}
			
			catch(Exception e)
			{		
				System.out.println("Error! Wrong ID\nPlease retry. If you think something is wrong please contact with IT support team.\nThanks\n");	
				return 0;
			
			}
			
		}
		else {
			return 0;
		}
		
		
	}	

}
