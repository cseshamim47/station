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

void bruteforce()
{}

void solve()
{
    int n;
    cin >> n;
    int arr[n];
    int neg = 0;
    int pos = 0;
    int zero = 0;
    int psum = 0;
    int nsum = 0;
    for(int i = 0; i < n; i++)
    {
        cin >> arr[i];
        if(arr[i] < 0)
        {
            neg++;
            nsum += arr[i];
        }
        else if(arr[i] > 0)
        {
            pos++;
            psum += arr[i];
        }else zero++;
    }
    
    int cnt = 0;
    if(neg % 2 == 0)
    {
        cnt += (psum-pos);
        cnt += (abs(nsum)-neg);
        cnt += zero;
    }else if(zero)
    {
        cnt += (psum-pos);
        cnt += (abs(nsum)-neg);
        cnt += zero;
    }else
    {
        cnt += (psum-pos);
        cnt += (abs(nsum)-neg);
        cnt += 2;
    }
    // if(neg >= pos)
    // {
        
    // }
    cout << cnt << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    // w(t)
    solve();
    //bruteforce();
}