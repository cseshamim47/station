package FileHandling;

import java.io.File;
import java.io.FileWriter;
import java.io.IOException;

public class FileOperation {
    
        private File file;			
		private FileWriter writer;		

        
        public void write(String str){
            
            try{
                file = new File("FileHandling/Books.txt");
                file.createNewFile();
                writer = new FileWriter(file, true);
                writer.write(str+"\n");
                writer.flush();									
				writer.close();	
            }
            catch(IOException e){
                System.out.println("Exception caught while writing the file");
            }
        }
             
}
