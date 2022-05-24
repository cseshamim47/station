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
int arr[210][210];
int f(int x,int y,int n,int m)
{
    int i = x;
    int j = y;
    int sum = 0;
    while(i >= 0 && j >= 0)
    {
        sum += arr[i][j];
        i--;
        j--;
    }

    i = x+1;
    j = y+1;
    while(i < n && j < m)
    {
        sum += arr[i][j];
        i++;
        j++;
    }

    i = x+1;
    j = y-1;
    while(i < n && j >= 0)
    {
        sum += arr[i][j];
        i++;
        j--;
    }

    i = x-1;
    j = y+1;
    // deb2(i,j);
    while(i >= 0 && j < m)
    {
        // deb(arr[i][j]);
        // cout << arr[i][j] << " ";
        sum += arr[i][j];
        i--;
        j++;
    }
    return sum;
}

int Case;
void solve()
{
    int i,j,m,n;
    n = in, m = in;
    int ans = 0;
    for(int i = 0; i < n; i++)
    {
        for(int j = 0; j < m; j++)
        {
            cin >> arr[i][j];
        }
    }

    for(int i = 0; i < n; i++)
    {
        for(int j = 0; j < m; j++)
        {
            ans = max(f(i,j,n,m),ans);
        }
    }
    // cout << f(0,1,n,m) << endl;
    cout << ans << endl;

    for(int i = 0; i < n; i++)
    {
        for(int j = 0; j < m; j++)
        {
            arr[i][j] = 0;
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