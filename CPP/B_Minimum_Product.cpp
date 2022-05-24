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
    int a = in, b = in, x = in, y = in, k = in;

    if(a > b)
    {
        swap(a,b);
        swap(x,y);
    }    

    int ans = 0;

    // if(max(a-k,x)*b < max(b-k,y)*a)
    // {
    //     ans = max(a-k,x)*b;
    // }else
    // {
    //     ans = max(b-k,y)*a;
    // }

    int aa = a, bb = b, xx = x, yy = y, kk = k;

    if(a-k >= x)
    {
        a -= k;
        k = 0;
    }else{
        k -= (a-x);
        a = x;
    }

    

    if(k)
    {
        if(b-k >= y)
        {
            b -= k;
            k = 0;
        }else
        {
            k -= (b-y);
            b = y;
        }
    }


    if(bb-kk >= yy)
    {
        bb -= kk;
        kk = 0;
    }else
    {
        kk -= (bb-yy);
        bb = yy;
    }

    if(kk)
    {
        if(aa-kk >= xx)
        {
            aa -= kk;
            kk = 0;
        }else{
            kk -= (aa-xx);
            aa = xx;
        }
    }


    cout << min(a*b,aa*bb) << endl;
    
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