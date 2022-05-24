#include <bits/stdc++.h>
using namespace std;

#define fo(i,n) for(i=0;i<n;i++)
#define vi vector<int>
#define pb push_back
#define pf push_front
#define deb(x) cout << #x << "=" << x << endl
#define deb2(x, y) cout << #x << "=" << x << "," << #y << "=" << y << endl
#define sq(x)  ( (x)*(x) )
#define s(x)   x.size()
#define all(x) x.begin(),x.end()
#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define nl printf("\n");
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define ll unsigned long long
#define MAX 1000006

struct{
    template<class T> operator T() {
        T x;
        cin >> x;
        return x;
    }
}in;

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
    int i,j,m,n;
    n = in;

    if(n < 4 || n%2 != 0) cout << -1 << endl;
    else
    {
        int x = n;
        int four = 0;
        int nf = 0, ns = 0;
        while(n%6 != 0)
        {
            n-=4;
            four++;
        }
        ns = n/6;
        n = x;

        int six = 0;
        while(n%4 != 0)
        {
            n-=6;
            six++;
        }

        nf = n/4;
        nf += six;
        ns += four;

        if(!nf || !ns)
        {
            int ans = max(nf,ns);
            cout << ans << " " << ans << endl;
        }else
        {
            cout << ns << " " << nf << endl;0
        }

    }



   
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