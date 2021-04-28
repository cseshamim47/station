import java.lang.*;
import java.util.*;

public class Start
{
	public static void main(String args[])
	{
		FileReadWriteDemo frwd = new FileReadWriteDemo();
	
		System.out.println("----------------------");
		frwd.writeInFile("Hello World");
		frwd.readFromFile();
		System.out.println("----------------------");
		frwd.writeInFile("Hello Java");
		frwd.readFromFile();
		
		
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
