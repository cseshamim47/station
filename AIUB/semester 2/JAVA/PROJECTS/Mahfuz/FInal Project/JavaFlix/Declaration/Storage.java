package Declaration;

public abstract class Storage // abstraction + encapsulation // Fully Operational
{
    protected String fullName;
    protected String username;
    protected String password;
    protected String mailAddress;
    protected String mobile;
    protected String movie = "Not Available";
    protected String timing = "Not Available";
    protected String price = "Not Available";

    // Setter
    public abstract void setFullName(String fullName);

    public abstract void setUsername(String username);

    public abstract void setPassword(String password);

    public abstract void setMailAddress(String mailAddress);

    public abstract void setMobile(String mobile);

    public abstract void setMovie(String movie);

    public abstract void setTiming(String timing);

    public abstract void setPrice(String price);

    // Getter
    public abstract String getFullName();

    public abstract String getUsername();

    public abstract String getPassword();

    public abstract String getMailAddress();

    public abstract String getMobile();

    public abstract String getMovie();

    public abstract String getTiming();

    public abstract String getPrice();

}
