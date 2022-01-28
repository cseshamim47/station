package FileHandling;

import java.io.BufferedReader;
import java.io.FileReader;
import java.io.IOException;

import UserInterface.UserInterface;

public class MoviesReader {

    private FileReader fileReader;
    private BufferedReader bufferedReader;

    public void readFromFile() {
        try {
            fileReader = new FileReader("FileHandling/Movies.txt");
            bufferedReader = new BufferedReader(fileReader);
            String text = "", temp;
            while ((temp = bufferedReader.readLine()) != null) {
                text = text + temp + "\n                                                              ";
            }
            System.out.print("                                                              " + text);
            bufferedReader.close();
            UserInterface.pause();
            if (text.equals(""))
                System.out.println("                                                              No Movies found!!!");
        } catch (IOException ioe) {
            ioe.printStackTrace();
        }
    }

}
