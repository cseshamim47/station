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

void f()
{}

int Case;
void solve()
{
    string str;
    cin >> str;
 
    int b = 0, a = 0;
    if(str[0] == 'B') b++;
    else a++;
 
    bool possible = true;
    for(int i = 1; i < s(str); i++)
    {
        if(b > a) possible = false;
        
        if(str[i] == 'B') b++;
        else a++;
 
    }
 
    if(s(str) == 1 || str[s(str)-1] == 'A' || b>a) 
    {
        possible = false;   
    }
 
    if(possible)
    {
        cout << "YES" << endl;
    }else cout << "NO" << endl;
}



int32_t main()
{
      //        Bismillah
    // fileInput();
    // BOOST
    w(t)
    // solve();
    // f();
}