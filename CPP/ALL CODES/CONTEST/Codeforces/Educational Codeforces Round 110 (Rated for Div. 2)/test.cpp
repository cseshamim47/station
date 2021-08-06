#include <bits/stdc++.h>
using namespace std;

int main()
{
    int arr[5] {3,2,5,1,2};
    auto x = find(arr,arr+5,2);
    cout << distance(arr,x) << endl;    
}