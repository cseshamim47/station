package Start;

public interface MemberOperation {
    boolean insertCustomer(Member m);
    boolean removeCustomer(Member m);
    Member getMember(String nid);
    void showAllMember();
}