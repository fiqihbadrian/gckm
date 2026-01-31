#!/bin/bash

echo "🧪 Testing Admin Dashboard Routes..."
echo ""

BASE_URL="http://127.0.0.1:8000"

# Test Public Homepage
echo "✓ Testing Public Homepage..."
STATUS=$(curl -s -o /dev/null -w "%{http_code}" $BASE_URL/)
if [ $STATUS -eq 200 ]; then
    echo "   ✅ Homepage: OK ($STATUS)"
else
    echo "   ❌ Homepage: FAIL ($STATUS)"
fi

# Test Login Page
echo "✓ Testing Login Page..."
STATUS=$(curl -s -o /dev/null -w "%{http_code}" $BASE_URL/login)
if [ $STATUS -eq 200 ]; then
    echo "   ✅ Login Page: OK ($STATUS)"
else
    echo "   ❌ Login Page: FAIL ($STATUS)"
fi

# Test Register Page
echo "✓ Testing Register Page..."
STATUS=$(curl -s -o /dev/null -w "%{http_code}" $BASE_URL/register)
if [ $STATUS -eq 200 ]; then
    echo "   ✅ Register Page: OK ($STATUS)"
else
    echo "   ❌ Register Page: FAIL ($STATUS)"
fi

echo ""
echo "🔐 Admin Routes (Need Authentication):"
echo "   - Dashboard: $BASE_URL/admin/dashboard"
echo "   - Berita: $BASE_URL/admin/berita"
echo "   - Denah: $BASE_URL/admin/denah"
echo ""
echo "📝 Login with:"
echo "   Email: admin@perumahan.com"
echo "   Password: password"
echo ""
echo "✅ All public routes tested!"
