#include <bits/stdc++.h>
using namespace std;

#define w(t) int t; cin >> t; while(t--){ solve(); }
#define ll long long
#define MAX 1000007
double arr[MAX];
double countDigits(int n)
{
    return log10(n);
}
int Case;
void solve()
{
    int n,b;
    cin >> n >> b;
    double dig = arr[n];
    if(b != 10) dig /= log10(b);
    cout << "Case " << ++Case << ": " << (int)dig + 1 << endl;
}

int main()
{
      //        Bismillah
    for(int i = 1; i < MAX; i++) arr[i] = countDigits(i)+arr[i-1];
    w(t)
    
}