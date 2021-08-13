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
    int arr[n];
    int sum = 0;
    for(int i = 0; i < n; i++)
    {
        cin >> arr[i];
        sum += arr[i];
    }
    int avg = sum/n;
    if(sum % n != 0) avg++;
    cout << avg << endl;


}

int main()
{
      //        Bismillah
    int t;   cin >> t;   w(t);
    

}