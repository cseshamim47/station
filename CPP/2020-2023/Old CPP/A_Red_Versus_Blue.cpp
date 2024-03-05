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
    int n, r, b;
    cin >> n >> r >> b;
    
    int x = r/(b+1);
    int y = r%(b+1);

    while(b--)
    {
        int tmp = x;
        if(y)tmp++,y--;
        for(int i = 0; i < tmp; i++)
        {
            cout << "R";
        }
        cout << "B";
    }

    if(y) x++;
    for(int i = 0; i < x; i++) cout << "R";
    printf("\n");
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