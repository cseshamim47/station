import java.lang.*;
public class Address
{
	
	private String houseno;
	private String roadno;
	private double postalco;
	public Address()
	{
		
	}
	public Address(String houseno,String roadno,double postalco)
	{
		this.houseno=houseno;
		this.roadno=roadno;
		this.postalco=postalco;
	}
	public void setHouseno(String houseno)
	{
		this.houseno=houseno;
	}
	public void setRoadno(String roadno)
	{
		this.roadno=roadno;
	}
	public void setPostalco(double postalco)
	{
		this.postalco=postalco;
	}
	public String getHouseno()
	{
		return houseno;
	}
	public String getRoadno()
	{
		return roadno;
	}
	public double getPostalco()
	{
		return postalco;
	}
	public void showDetails()
	{
		System.out.println("Houseno is : "+houseno);
		System.out.println("Roadno is : "+roadno);
		System.out.println("Postal code is : "+postalco);

	}
}