#include <iostream>
using namespace std;

int main()
{
    int n,k,l,c,d,p,ml,np,bot,lem,salt,ans;
    cin >> n >> k >> l >> c >> d >> p >> ml >> np;
    bot = ((k*l)/ml)/n;
    lem = (c*d)/n;
    salt = (p/np)/n;
    if(bot<lem && bot<salt){
        ans = bot;
    }else if(lem<bot && lem<salt) ans = lem;
    else ans = salt;
    cout << ans;

}