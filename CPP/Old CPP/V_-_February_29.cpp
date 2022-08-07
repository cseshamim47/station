#include <bits/stdc++.h>
using namespace std;

#define sq(x)  ( (x)*(x) )
#define s(x)   x.size()
#define all(x) x.begin(),x.end()
#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define ll unsigned long long
#define MAX 1000006

void fileInput()
{
    #ifndef ONLINE_JUDGE
        freopen("input.txt", "r", stdin);
        freopen("output.txt", "w", stdout);
    #endif
}

int gcd(int a, int b)
{
    if(!b) return a;
    return gcd(b,a%b);
}

vector<int> leapYear;
void f()
{
    for(int i = 2000; i <= 2000000000; i+=4)
    {
        if(i % 100 == 0 && i % 400 != 0) continue;
        if(i % 4 == 0 || i % 100 == 0) leapYear.push_back(i);
    }
}

int Case;
void solve()
{
    string months[] = {"January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"};

    string mon[2];
    int date[2];
    int year[2];

    cin >> mon[0];
    cin >> date[0];
    getchar();
    cin >> year[0];

    cin >> mon[1];
    cin >> date[1];
    getchar();
    cin >> year[1];


    int ans = year[1]/4 - (year[0]-1)/4;
    int bad =(year[1]/100 - (year[0]-1)/100) - (year[1]/400 - (year[0]-1)/400);
    ans-=bad;
    
    
    if((year[0]%4 == 0 && year[0]%100 != 0) || (year[0]%100 == 0 && year[0]%400 == 0))
    {
        if(mon[0] != "January" && mon[0] != "February")
            ans--;
    }

    if((year[1]%4 == 0 && year[1]%100 != 0) || (year[1]%100 == 0 && year[1]%400 == 0))
    {
        if(mon[1] == "January")
            ans--;
        else if(mon[1] == "February" && date[1] != 29) ans--;
    }

    printf("Case %lld: %lld\n",++Case, ans);  


}

int32_t main()
{
      //        Bismillah
    // fileInput();
    // BOOST
    // f();
    // cout << leapYear.size() << endl;
    w(t)
    // solve();
}