public abstract class Login extends IDB {
	
	 String id = "";
	String password = "";
    String filepath;
    String sl = "";
    
	boolean found = false;
	String tempID = "";
	String tempPassword = "";
	
	public abstract void verify();

}
