import java.lang.*;
import java.util.*;

public class Start
{
	public static void main(String args[])
	{
		FileReadWriteDemo frwd = new FileReadWriteDemo();
	
		// System.out.println("----------------------");
		String chk = "pk\nawesome movie\n#";
		frwd.writeInFile("\n"+chk);
		frwd.readFromFile("Mahfuz");
		// System.out.println("----------------------");
		// frwd.writeInFile("Hello Java");
		// frwd.readFromFile();
		
		
		/*
		File content should be
		Hello World
		Hello Java
		*/
		
		/*
		The output Should be
		----------------------
		Hello World
		----------------------
		Hello World
		Hello Java
		*/
	}
}
