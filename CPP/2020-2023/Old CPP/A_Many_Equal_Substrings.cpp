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
//? solved it by watching someone else code..Alhumdulillah
void solve() //! couldn't solve it...Allah help me :( 
{
    int n,m;
    cin >> n >> m;
    string str;
    cin >> str;

    for(int l = n-1; l > 0; --l)
    {
        if(str.substr(0,l) == str.substr(n-l))
        {
            cout << str;
            while(--m)
            {
                cout << str.substr(l);
            }
            return;
        }
    } 
    while(m--) cout << str;
    printf("\n");
}



int32_t main()
{
      //        Bismillah
    // fileInput();
    BOOST
    // w(t)
    solve();
    // f();
}