#include <bits/stdc++.h>
using namespace std;

#define w(t) int t; cin >> t; while(t--){ solve(); }
#define ll long long
#define MAX 1000006

void solve()
{
	int n;
	cin >> n;
	int a[n];
	int b[n];
	int bsmall = INT_MAX;
	int asmall = INT_MAX;
	
	for(int i = 0; i < n; i++)
	{
		cin >> a[i];
		if(asmall > a[i]) asmall = a[i];
	}
	
	for(int i = 0; i < n; i++)
	{
		cin >> b[i];
		if(bsmall > b[i]) bsmall = b[i];
	}
	
	ll cnt = 0;
	for(int i = 0; i < n; i++)
	{
		if(a[i] == asmall && b[i] == bsmall) continue;
		if(a[i] > asmall)
		{
			int tmp = a[i] - asmall;
			int btmp = b[i] - bsmall;
			cnt += tmp;
			if(tmp >= btmp)
			{
				continue;
			}
			else 
				b[i] -= tmp;
		}
		if(b[i] > bsmall)
		{
			cnt += (b[i] - bsmall);
		}
	}
	cout << cnt << "\n";
}

int main()
{
	  //        Bismillah
	w(t)
	
}