/// https://www.hackerrank.com/domains/cpp
// typecasting
// max/min of 2/3/n numbers
// accumulate function
// search a specific number
// sorting -> array and vector
// custom sorting
// Reference
// problem solving -> swap function, frequency count

// 2d vector -> two way
/* tasks : 
1. print the index number of max element in an array
2. check if an array is sorted or not
3. given 3 numbers you have to tell if sum of any two of them is equal to the third one. If yes then Print YES, else print NO 
*/

#include <bits/stdc++.h>
using namespace std;

void typecast()
{
    double d = 10.534;
    int x = d;
    cout << (int)d << endl;

    string num = "123";
    int numConv = stoi(num);
    int op = 45;
    string str = to_string(op);

    cout << numConv+100 << endl;
    num += str;
    cout << num << endl;
}

void maxAccumulate()
{
    int arr[5] = {10,3,5,2,6};
    int sum = accumulate(arr+1,arr+5,0);
    cout << sum << endl;
    int maxValue = *max_element(arr+3,arr+5);
    cout << maxValue << endl;

    for(int i = 0; i < 5; i++)
    {
        // maxValue = max(maxValue,arr[i]);
        if(maxValue < arr[i])
        {
            maxValue = arr[i];
        }
    }

    cout << maxValue << endl;
    
    int a = 5, b = 10, c = 15;

    cout << max({a,b,c}) << endl;
    cout << min({a,b,c}) << endl;

    if(a <= b) cout << b << endl;
    else cout << a << endl;
}

/// >50, <75, <62, >56, <59, <57, <58, 57

void search()
{
    int n = 5;
    int arr[n] = {10,3,5,2,6};
    sort(arr,arr+n);
    auto isFound = binary_search(arr,arr+n,100);
    if(isFound) cout << "Found" << endl;
    else cout << "Not found" << endl;

    int value = 1;
    for(int i = 0; i < 5; i++)
    {
        if(arr[i] == value) 
        {
            cout << "Value found : " << arr[i] << endl;
            return;
        }
    }
    cout << "value not found" << endl;
}

void upperBound_LowerBound()
{
    vector<int> v{1,2,2,3,100,3,3,3,5,6,7,8};
    sort(v.begin(),v.end());
    auto it = lower_bound(v.begin(),v.end(),5)-v.begin();
    cout << it << endl;
}

bool cmp(int &a, int &b)
{
    // return a > b;
    if(a%2 == b%2)
    {
        if(a > b) swap(a,b);
        return true;
    }
    else return false;
}

void sorting()
{

    vector<int> evenOdd{3,2,7,14,8,1};

    sort(evenOdd.begin(),evenOdd.end(),cmp);

    // sort(evenOdd.begin(),evenOdd.begin()+3);
    // sort(evenOdd.begin()+3,evenOdd.end());

    for(auto &x : evenOdd) cout << x << " ";
    cout << endl;
    vector<int> v{10,2,300,4,50};

    sort(v.begin(),v.begin()+4);
    // sort(v.rbegin(),v.rend());
    // sort(v.begin(),v.end(),greater<int>());
    // reverse(v.begin(),v.end());

    // for(auto x : v) cout << x << " ";cout << endl;


}

void mySwap(int& a, int& b)
{
    int tmp = a;
    a = b;
    b = tmp;
    cout << a << " " << b << endl;
}

void reference()
{
    int a = 5, b = 10;
    int &ref = a; // 
    ref = 7;
    cout << ref << endl;
    // swap(a,b);
    // cout << a << endl;
    // cout << b << endl;

    mySwap(a,b);

    cout << a << " "  << b << endl;
}

int main()
{
    
}