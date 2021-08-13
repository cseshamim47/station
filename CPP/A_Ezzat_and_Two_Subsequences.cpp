//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define eps 1e-12
#define MAX 10000005
#define ll long long
#define w(t) while(t--){ solve(); }
ll cnt;

void solve()
{
    int n;
    cin >> n;
    double arr[n+5];
    double maxx = INT_MIN;
    double sum = 0;
    for(int i = 0; i < n; i++)
    {
        cin >> arr[i];
        if(maxx < arr[i]) maxx = arr[i];
        sum += arr[i];
    }
    sum -= maxx;
    double avg = sum/(n-1);
    double ans = avg + maxx;
    cout << setprecision(9) << fixed << ans << "\n"; 
}

int main()
{
      //        Bismillah
    ios::sync_with_stdio(false);
    cin.tie(NULL);
    int t;   cin >> t;   w(t);
    

}