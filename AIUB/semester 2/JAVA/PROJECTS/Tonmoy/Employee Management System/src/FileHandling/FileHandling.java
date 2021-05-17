package FileHandling;
import java.lang.*;
import java.io.*;

public class FileHandling {
    private File file;
    private FileWriter fileWriter;
    private FileReader fileReader;
    private BufferedReader bufferedReader;

    public void writeInFile(String s){
        try {
            file = new File("FileHandling/History.txt");
            file.createNewFile();
            fileWriter = new FileWriter(file,true);
            fileWriter.write(s+"\r"+"\n");
            fileWriter.flush();
            fileWriter.close();

        }catch (IOException ioe){
            ioe.printStackTrace();
        }
    }

    public void readFromFile(){
        try {
            fileReader = new FileReader("FileHandling/History.txt");
            bufferedReader = new BufferedReader(fileReader);
            String text = "",temp;
            while ((temp=bufferedReader.readLine())!=null){
                text = text+temp+"\n                                                              ";
            }
            System.out.print("                                                              "+text);
            bufferedReader.close();
            if(text.equals("")) System.out.println("                                                              No History found!!!");
        }catch (IOException ioe){
            ioe.printStackTrace();
        }
    }

    public void singleUserReadFromFile(String username){
        try {
            fileReader = new FileReader("FileHandling/History.txt");
            bufferedReader = new BufferedReader(fileReader);
            String text = "",temp;
            while ((temp=bufferedReader.readLine())!=null){
                if(temp.contains(username)){
                    text = text+temp+"\n                                                              ";
                }
            }
            System.out.print("                                                              "+text);
            bufferedReader.close();
            if(text.equals("")) System.out.println("No History found!!!");
        }catch (IOException ioe){
            ioe.printStackTrace();
        }
    }
}
