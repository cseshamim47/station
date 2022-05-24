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
    char ch;
    int h1,m1,h2,m2;
    cin >> h1 >> ch >> m1 >> h2 >> ch >> m2;
    int M = 0;
    M = 60-m1;
    
    // for(int i = (h1+1); i < h2; i++)
    // {
    //     M += 60;
    // }

    int i = h1%24;
    i++;
    while(i != h2)
    {
        if(h1 == h2 && m1 < m2) break;
        M+=60;
        i++;
        i%=24;
    }
    M+= m2;
    // cout << M << endl;
    M/=2;


    M += m1;
    if(h1 == h2) M = (m2-m1)/2 + m1; 
    int H = (h1+(M/60))%24;
    M%=60;

    H %= 24;
    // cout << H << endl;
    if(s(to_string(H)) == 1) cout << 0;
    cout << H << ":";
    if(s(to_string(M)) == 1) cout << 0;
    cout << M << endl;

}

int32_t main()
{
      //        Bismillah
    // fileInput();
    // BOOST
    // w(t)
    solve();
    // f();
}