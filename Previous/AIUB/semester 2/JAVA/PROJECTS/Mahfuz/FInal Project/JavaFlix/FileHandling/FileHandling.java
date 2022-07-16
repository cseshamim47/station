package FileHandling;

import java.io.*;

public class FileHandling {
    private File file;
    private FileWriter fileWriter;

    public void writeInFile(String s) {
        try {
            file = new File("FileHandling/Ticket.txt");
            file.createNewFile();
            fileWriter = new FileWriter(file, true);
            fileWriter.write(s + "\r" + "\n");
            fileWriter.flush();
            fileWriter.close();

        } catch (IOException ioe) {
            ioe.printStackTrace(); // Shows exactly in which line the problem is.
        }
    }

}
